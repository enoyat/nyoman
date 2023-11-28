<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\Role;
use App\Models\M_jadwalregistrasi;
use Session;

class CekSession
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */

    public function handle($request, Closure $next)
    {
            $dthsms=M_jadwalregistrasi::where('status', '1')
                    ->select('thsms')
                    ->get();
            
            foreach ($dthsms as $key ) {
                $thsms=$key->thsms;
            }

            if(empty($thsms)) {
                Session::flash('success', 'Mohon Maaf Pendaftaran Belum dibuka!');
               return redirect('/');

            }
            else {
                 Session::put('thsms', $thsms);           
            }
            
            return $next($request);
    }
}
