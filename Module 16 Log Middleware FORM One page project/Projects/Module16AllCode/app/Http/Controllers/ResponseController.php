<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ResponseController extends Controller
{
    public function log_show()
    {
        // Emergency: System unusable
        Log::emergency('System is down!', ['server' => 'web-1']);

        // Alert: Immediate action required
        Log::alert('Payment gateway is unavailable!', ['payment_service' => 'Stripe']);

        // Critical: Critical conditions
        Log::critical('Critical error encountered in the system.', ['disk_space' => 'low']);

        // Error: Runtime errors
        Log::error('Failed to save user data.', ['user_id' => 42]);

        // Warning: Exceptional situations
        Log::warning('Cache directory is not writable.', ['path' => '/var/www/storage/cache']);

        // Notice: Normal but significant events
        Log::notice('User logged in successfully.', ['user_id' => 123]);

        // Info: General informational messages
        Log::info('New user registration.', ['email' => 'example@example.com']);

        // Debug: Detailed debug information
        Log::debug('Query executed', ['query' => 'SELECT * FROM users']);

        // Logging with additional context
        Log::info('Processing order', ['order_id' => 9876, 'status' => 'pending']);

        // Logging arrays or objects
        $user = ['id' => 1, 'name' => 'John Doe', 'email' => 'john@example.com'];
        Log::debug('User data:', $user);

        // Using the logger helper
        logger('A quick log message using the logger helper.');

        // Logging to a custom channel
        Log::channel('custom')->info('Logging to the custom channel.');
    }
    public function session_put(Request $request){

        $request->session()->put('email', $request->email);
        $request->session()->put('theme', 'dark');

        \Log::info('Session after PUT', $request->session()->all());

        return response()->json([
            "msg"=>"Session stored successfully"
        ]);
    }
    public function session_get(Request $request){
        $email=$request->session()->get('email');
        $theme=$request->session()->get('theme');

        \Log::info('Session during GET', $request->session()->all());
        return response()->json([
            "Email"=>$email,
            "Theme"=>$theme
        ]);
    }
    public function session_pull(Request $request){
        //pull can give data only for first time
        //for second pull it give default value
        $email=$request->session()->pull('email','DefaultEmail');
        $theme=$request->session()->pull('theme','DefaultTheme');

        \Log::info('Session during PULL', $request->session()->all());
        return response()->json([
            "Email"=>$email,
            "Theme"=>$theme
        ]);
    }
    public function session_forget(Request $request){
        //pull can give data only for first time
        //for second pull it give default value
        $email=$request->session()->forget('email');
        $theme=$request->session()->forget('theme');

        \Log::info('Session during Forget', $request->session()->all());
        return response()->json([
            "Email"=>$email,
            "Theme"=>$theme
        ]);
    }
    public function session_flash(Request $request){
        //pull can give data only for first time
        //for second pull it give default value
        $email=$request->session()->flash('email');
        $theme=$request->session()->flash('theme');

        \Log::info('Session during Flash', $request->session()->all());
        return response()->json([
            "Email"=>$email,
            "Theme"=>$theme
        ]);
    }
}
