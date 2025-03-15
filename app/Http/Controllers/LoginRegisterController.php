<?php

namespace App\Http\Controllers;

use App\Http\Requests\FrontendLoginRequest;
use App\Http\Requests\FrontendRegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class LoginRegisterController extends Controller
{
    public function loginPage()
    {
        return view('frontend.pages.auths.login');
    }

    public function registerPage()
    {
        return view('frontend.pages.auths.register');
    }

    public function registerAuthenticate(FrontendRegisterRequest $request)
    {
        $credentials = $request->validated();

        // Upload photo
        if($request->hasFile('photo')){
            $photo = $request->file('photo');
            $photoName = time().'.'.$photo->getClientOriginalExtension();
            $path = $photo->storeAs('user-photos', $photoName, 'public');
            $credentials['photo'] = $path;
        }
        // Password hash
        $credentials['password'] = Hash::make($credentials['password']);

        $user = User::create($credentials);
        if($user){
            Auth::login($user);
            return redirect()->route('home')->with('success', 'Registration successful. Please login to continue.');
        }else{
            return back()->with('error', 'Registration failed. Please try again.');
        }
    }
    /**
     * Handle OTP request for login
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function requestOtp(Request $request)
    {
        // Validate the request
        $validator = Validator::make($request->all(), [
            'whatsapp' => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'error' => $validator->errors()->first()
            ], 422);
        }

        $whatsapp = $request->whatsapp;

        // Check if user exists
        $user = User::where('whatsapp', $whatsapp)->first();

        if (!$user) {
            return response()->json([
                'error' => 'No account found with this WhatsApp number'
            ], 404);
        }

        // Generate OTP
        $otp = rand(100000, 999999); // 6-digit OTP

        // Store OTP in cache with expiration (10 minutes)
        $cacheKey = 'otp_' . $whatsapp;
        Cache::put($cacheKey, $otp, now()->addMinutes(10));

        // Log the OTP for development purposes
        Log::info("OTP for {$whatsapp}: {$otp}");

        // Send OTP via WhatsApp
        $result = $this->sendWhatsAppMessage($whatsapp, "Your OTP for login is: {$otp}. It will expire in 10 minutes.");

        if (!$result['success']) {
            return response()->json([
                'error' => 'Failed to send OTP: ' . $result['message']
            ], 500);
        }

        return response()->json([
            'message' => 'OTP sent successfully to your WhatsApp number',
            'debug_otp' => $otp, // Remove this in production
        ]);
    }

    /**
     * Send WhatsApp message using WhatsApp Business API
     *
     * @param string $to Recipient's WhatsApp number
     * @param string $message Message content
     * @return array Success status and message
     */
    private function sendWhatsAppMessage($to, $message)
    {
        try {
            // Format the phone number (remove any non-numeric characters and ensure it has country code)
            $to = preg_replace('/[^0-9]/', '', $to);

            // Add country code if not present (assuming Bangladesh +880 as default)
            if (substr($to, 0, 3) !== '880') {
                $to = '880' . ltrim($to, '0');
            }

            // Initialize cURL session
            $curl = curl_init();

            // WhatsApp Business API endpoint (replace with your actual provider's endpoint)
            $apiUrl = env('WHATSAPP_API_URL', 'https://api.whatsapp.com/v1/messages');
            $apiKey = env('WHATSAPP_API_KEY', '');

            // Prepare the payload
            $payload = [
                'to' => $to,
                'type' => 'text',
                'text' => [
                    'body' => $message
                ]
            ];

            // Set cURL options
            curl_setopt_array($curl, [
                CURLOPT_URL => $apiUrl,
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => '',
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 30,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => 'POST',
                CURLOPT_POSTFIELDS => json_encode($payload),
                CURLOPT_HTTPHEADER => [
                    'Content-Type: application/json',
                    'Authorization: Bearer ' . $apiKey
                ],
            ]);

            // Execute the request
            $response = curl_exec($curl);
            $err = curl_error($curl);

            // Close cURL session
            curl_close($curl);

            // Check for errors
            if ($err) {
                Log::error("WhatsApp API Error: " . $err);
                return [
                    'success' => false,
                    'message' => 'cURL Error: ' . $err
                ];
            }

            // Parse the response
            $responseData = json_decode($response, true);

            // Check if the message was sent successfully
            if (isset($responseData['error'])) {
                Log::error("WhatsApp API Error: " . json_encode($responseData));
                return [
                    'success' => false,
                    'message' => $responseData['error']['message'] ?? 'Unknown error'
                ];
            }

            return [
                'success' => true,
                'message' => 'Message sent successfully',
                'data' => $responseData
            ];
        } catch (\Exception $e) {
            Log::error("WhatsApp Sending Exception: " . $e->getMessage());
            return [
                'success' => false,
                'message' => $e->getMessage()
            ];
        }
    }

    /**
     * Authenticate the user
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function loginAuthenticate(FrontendLoginRequest $request)
    {
        $credentials = $request->validated();
        // Check if login is via OTP
        if ($request->has('otp') && $request->otp) {
            return $this->authenticateWithOtp($request);
        }
        // dd($credentials);
        // Login with password

        if (Auth::attempt(['whatsapp' => $credentials['whatsapp'], 'password' => $credentials['password']], $request->boolean('remember'))) {
            $request->session()->regenerate();
            return redirect()->route('home');
        }

        return back()->withErrors([
            'error' => 'The provided credentials do not match our records.',
        ])->withInput($request->only('whatsapp', 'remember'));
    }

    /**
     * Authenticate with OTP
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    private function authenticateWithOtp(Request $request)
    {
        $whatsapp = $request->whatsapp;
        $otp = $request->otp;

        // Get stored OTP from cache
        $cacheKey = 'otp_' . $whatsapp;
        $storedOtp = Cache::get($cacheKey);

        if (!$storedOtp || $storedOtp != $otp) {
            return back()->withErrors([
                'error' => 'Invalid OTP. Please try again.',
            ])->withInput($request->only('whatsapp', 'remember'));
        }

        // OTP is valid, find and login the user
        $user = User::where('whatsapp', $whatsapp)->first();

        if (!$user) {
            return back()->withErrors([
                'error' => 'No account found with this WhatsApp number',
            ])->withInput($request->only('whatsapp', 'remember'));
        }

        // Login the user
        Auth::login($user, $request->boolean('remember'));

        // Clear the OTP from cache
        Cache::forget($cacheKey);

        // Regenerate session
        $request->session()->regenerate();

        return redirect()->intended('dashboard');
    }
}
