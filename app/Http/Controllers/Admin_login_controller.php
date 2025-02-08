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
use Illuminate\Support\Facades\Password;
class Admin_login_controller extends Controller
{

    public function showLoginPage()
    {
        return view('Loginform.Login');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
            'role' => 'required|in:student,teacher',
            'department_id' => 'required|exists:departments,id'
        ]);

        // Create the user
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role, 
            'department_id' => $request->department_id,
        ]);

        // Generate the token
        $token = $user->createToken('Token')->plainTextToken;

        return response()->json([
            'success' => true,
            'message' => 'User registered successfully',
            'user' => $user,
            'token' => $token,
        ]);

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

    public function student(Request $request)
    {
        return response()->json([
            'message' => 'Welcome to the Teacher Dashboard',
            'user' => $request->user(),
        ]);
    }
    public function profile_update(Request $request)
    {
        $user = auth()->user();

        if (!$user) {
            return response()->json([
                'success' => false,
                'message' => 'Unauthorized'
            ], 401);
        }

        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors());
        }

        $user->name = $request->name;
        $user->email = $request->email;

        if ($user instanceof \App\Models\User) {
            $user->save();
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Failed to update user data. Invalid user model.'
            ], 500);
        }

        return response()->json([
            'success' => true,
            'data' => $user
        ]);
    }
    public function logout(Request $request)
    {
        Auth::logout(); // Logs the user out
        $request->session()->invalidate(); // Invalidates the session
        $request->session()->regenerateToken(); // Regenerates the CSRF token
        return redirect('/login'); // Redirect to login page
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

    public function sendResetLinkEmail(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users,email',
        ]);

        $response = Password::sendResetLink($request->only('email'));

        if ($response === Password::RESET_LINK_SENT) {
            return response()->json(['message' => 'We have emailed your password reset link!']);
        }

        return response()->json(['error' => 'We can\'t find a user with that email address.'], 404);
    }
    public function getStudents()
    {
        $students = User::with('department')->where('role', 'student')->get();
    
        return response()->json($students);
    }

}
