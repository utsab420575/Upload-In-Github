<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Symfony\Component\HttpFoundation\Response;

class WorkingHourMiddlware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        echo "From WorkingHourMiddleWare\n";
        // Get the current hour using Carbon
        $currentHour = Carbon::now('Asia/Dhaka')->hour;

        // Check if the time is outside of working hours
        //<9 || >=17
       /*  if ($currentHour < 9 || $currentHour >= 30) {
            return response('Access allowed only during working hours (9 AM - 5 PM).', 403);
        } */
        if($request->header('API-KEY')!='xyz123'){
            return response("Unauthorize person can't access",401);
        }
        // Allow the request to proceed
        return $next($request);
    }
}
