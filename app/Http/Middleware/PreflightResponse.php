<?php


namespace App\Http\Middleware;


use Closure;
use Illuminate\Http\Request;

class PreflightResponse
{
  /**
   * Handle an incoming request.
   *
   * @param Request $request
   * @param Closure $next
   * @return mixed
   */
  public function handle($request, Closure $next)
  {
    if ($request->getMethod() === "OPTIONS") {
      return response('')->withHeaders([
        'Access-Control-Allow-Origin' => '*',
        'Access-Control-Allow-Methods' => 'OPTIONS',
        'Access-Control-Allow-Headers' => 'CONTENT-TYPE'
      ]);
    }
    return $next($request);
  }
}
