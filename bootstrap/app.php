<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Spatie\Permission\Exceptions\UnauthorizedException;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware): void {
        $middleware->validateCsrfTokens(except: [
            'enrol/submit',
        ]);

        $middleware->alias([
            'role'       => \Spatie\Permission\Middleware\RoleMiddleware::class,
            'permission' => \Spatie\Permission\Middleware\PermissionMiddleware::class,
            'geoblock'   => \App\Http\Middleware\GeoBlock::class,
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        $exceptions->render(function (UnauthorizedException $e, $request) {
            $user = Auth::user();
            Log::warning('Role check failed', [
                'url'   => $request->fullUrl(),
                'user'  => $user ? ['id' => $user->id, 'email' => $user->email, 'roles' => $user->getRoleNames()] : 'unauthenticated',
                'required_roles' => $e->getRequiredRoles(),
            ]);

            if (! $user) {
                return redirect()->route('login');
            }

            // Redirect each role to their own portal
            if ($user->hasRole('admin') || $user->hasRole('super_admin')) {
                return redirect()->route('admin.dashboard')->with('error', 'You do not have access to that page.');
            }
            if ($user->hasRole('teacher')) {
                return redirect()->route('teacher.dashboard')->with('error', 'You do not have access to that page.');
            }
            if ($user->hasRole('child')) {
                return redirect()->route('child.dashboard')->with('error', 'You do not have access to that page.');
            }
            if ($user->hasRole('parent')) {
                return redirect()->route('parent.dashboard')->with('error', 'You do not have access to that page.');
            }

            return redirect()->route('login')->with('error', 'You do not have access to that page.');
        });
    })->create();
