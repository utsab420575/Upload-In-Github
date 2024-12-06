<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class RequestController extends Controller
{
    public function ip_address(Request $request)
    {
        $ip_address = $request->ip();
        return $ip_address;
    }

    public function get_cookies(Request $request)
    {
        $allCookies = $request->cookies->all(); // Get all cookies as an array
        return response()->json(['all_cookies' => $allCookies]);

        return $request->cookie();

        $cookieValue = $request->cookie('Cookie_1'); // Retrieves the value of 'Cookie_1'
        return response()->json(['Cookie_1' => $cookieValue]);
    }

    public function get_response(Request $request)
    {
        return response()->json(
            [
                'status' => 'Error',
                'msg' => 'Data Not Recived',
                'error_code' => 12345,
            ],
            400,
        );
    }

    public function redirection1()
    {
        echo 'Page 1';
        return redirect()->route('redirection2');
    }
    public function redirection2()
    {
        return 'Page 2';
    }

    public function cookie_set()
    {
        $name = 'token';
        $value = '1234xyz';
        $minutes = 60;
        $path = '/';
        $domain = $_SERVER['SERVER_NAME']; // Defaults to the current domain
        $secure = true; // Cookie is not limited to HTTPS
        $httponly = true; // Cookie is accessible via JavaScript
        return response('Cookie has been set')->cookie(
            $name,$value,$minutes,$path,$domain,$secure,$httponly
        );
    }
}
