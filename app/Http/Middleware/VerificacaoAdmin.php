<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class VerificacaoAdmin
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

        //Verificacao se o usuario é Admin
        if(!Auth::user()->ehAdmin()){
            session(["mensagem" => "Você não tem permissão para isso"]);
            return back();
        }

        return $next($request);
    }
}
