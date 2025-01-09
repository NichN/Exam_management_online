<?php
    namespace App\Http\Middleware;

    use Closure;
    use Illuminate\Http\Request;
    
    class Rolemiddleware
    {
        public function handle(Request $request, Closure $next, $role)
        {
            if (auth()->user() && auth()->user()->role === $role) {
                return $next($request);
            }
    
            return response()->json(['message' => 'Access denied'], 403);
        }
    }
    
?>