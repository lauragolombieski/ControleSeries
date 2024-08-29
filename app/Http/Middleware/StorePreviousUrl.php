<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class StorePreviousUrl
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        // Recupera o histórico das URLs da sessão
        $history = $request->session()->get('user_history', []);

        // Adiciona a URL atual ao início do histórico, removendo a URL mais antiga se o histórico exceder um determinado tamanho
        if (!in_array(url()->current(), $history)) {
            array_unshift($history, url()->current());
            // Limita o tamanho do histórico, por exemplo, a 10 páginas
            if (count($history) > 10) {
                array_pop($history);
            }
            $request->session()->put('user_history', $history);
        }

        return $next($request);
    }
}
