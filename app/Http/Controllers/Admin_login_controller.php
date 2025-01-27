<?php
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Validator;


class Admin_login_controller extends Controller
{

    public function showLoginPage()
    {
        return view('Loginform.Login');
    }

    public function register(Request $request)
    {
        try {
            // Validate the incoming request data
            $validatedData = $request->validate([
                'name' => 'required|string|max:50',
                'email' => 'required|string|email|max:50|unique:users',
                'password' => 'required|string|min:8',
                'role' => 'required|in:student,teacher'
            ]);

            // Hash the password before storing it
            $validatedData['password'] = Hash::make($validatedData['password']);

            // Log the validated data for debugging
            \Log::info('Validated data: ', $validatedData);

            // Create a new user record and return it as a JSON response with a 201 status code
            $user = User::create($validatedData);
            return response()->json($user, 201);
        } catch (\Illuminate\Validation\ValidationException $e) {
            // Log validation errors
            \Log::error('Validation error: ', $e->errors());
            return response()->json(['error' => 'Validation Error', 'messages' => $e->errors()], 422);
        } catch (\Exception $e) {
            // Log the error for debugging
            \Log::error('Error creating user: ' . $e->getMessage());
            return response()->json(['error' => 'Internal Server Error', 'message' => $e->getMessage()], 500);
        }
        //    $request->validate([
        //         'name' => 'required|string|max:255',
        //         'email' => 'required|email|unique:users',
        //         'password' => 'required|min:6', 
        //         'role' => 'required|in:student,teacher'
        //     ]);

        //     $user = User::create([
        //         'name' => $request->name,
        //         'email' => $request->email,
        //         'password' => Hash::make($request->password),
        //     ]); 

        //     $token = $user->createToken('Token')->plainTextToken;

        //     return response()->json([
        //         'success' => true,
        //         'message' => 'User registered successfully',
        //         'user' => $user,
        //         'token' => $token,  
        //     ]);
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            $token = $user->createToken('Token')->plainTextToken;
            return response()->json([
                'success' => true,
                'user' => $user,
                'role' => $user->role,
                'token' => $token
            ]);
        }
        return response()->json(['success' => false, 'message' => 'Invalid credentials'], 401);
    }

    public function teacher(Request $request)
    {
        return response()->json([
            'message' => 'Welcome to the Teacher Dashboard',
            'user' => $request->user(),
        ]);
    }

    //need to pul fronten sin
    public function student(Request $request)
    {
        return response()->json([
            'message' => 'Welcome to the Teacher Dashboard',
            'user' => $request->user(),
        ]);
    }
    public function profile_update(Request $request)
    {
        if (auth()->user()) {
            $validator = Validator::make($request->all(), [
                'id' => 'required',
                'name' => 'required|string|max:255',
                'email' => 'required|email|unique:users',
            ]);
            if ($validator->fails()) {
                return response()->json(
                    $validator->errors()
                );
            }
            $user = User::find($request->id);
            $user->name = $request->name;
            $user->email = $request->email;
            $user->save();

            return response()->json([
                'success' => true,
                'data' => $user
            ]);
        } else {
            return response()->json([
                'success' => false
            ]);
        }
    }
    public function logout(Request $request)
    {
        auth()->logout();
        return response()->json([
            'success' => true,
            'message' => 'User logout Success'
        ], 200);
    }
    public function sentverifyemail($email)
    {

        $user = User::where('email', $email)->first();

        if (!$user) {
            return response()->json([
                'success' => false,
                'message' => 'User not found',
            ], 404);
        }

        $verificationToken = Str::random(40);

        $user->remember_token = $verificationToken;
        $user->save();

        $domain = URL::to('/');
        $verificationUrl = $domain . '/verify-mail/' . $verificationToken;

        $data = [
            'url' => $verificationUrl,
            'email' => $email,
            'title' => 'Email Verification',
            'body' => 'Click the link below to verify your email',
        ];

        try {

            Mail::send('Loginform.VerifyEmail', ['data' => $data], function ($message) use ($data) {
                $message->to($data['email'])->subject($data['title']);
            });


            return response()->json([
                'success' => true,
                'message' => 'Verification email sent successfully',
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to send verification email',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    public function verificationMail($token)
    {
        $user = User::where('remember_token', $token)->first();

        if (!$user) {
            return response()->json([
                'success' => false,
                'message' => 'Invalid or expired token.',
            ], 400);
        }

        if ($user->is_verified) {
            return response()->json([
                'success' => false,
                'message' => 'Email already verified.',
            ], 400);
        }

        $datetime = Carbon::now()->format('Y-m-d H:i:s');

        $user->remember_token = '';
        $user->is_verified = 1;
        $user->email_verified_at = $datetime;
        $user->save();

        return response()->json([
            'success' => true,
            'message' => 'Email verified successfully.',
        ]);
    }



}
