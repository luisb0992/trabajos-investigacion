<?php

namespace App\Http\Middleware;

use Illuminate\Http\Request;
use Inertia\Middleware;
use Tightenco\Ziggy\Ziggy;

class HandleInertiaRequests extends Middleware
{
    /**
     * The root template that is loaded on the first page visit.
     *
     * @var string
     */
    protected $rootView = 'app';

    /**
     * Determine the current asset version.
     */
    public function version(Request $request): string|null
    {
        return parent::version($request);
    }

    /**
     * Define the props that are shared by default.
     *
     * @return array<string, mixed>
     */
    public function share(Request $request): array
    {
        $inv_work = config('filesystems.paths.inv_work');

        return [
            ...parent::share($request),
            'auth' => [
                'user' => $request->user(),
            ],
            'ziggy' => fn () => [
                ...(new Ziggy)->toArray(),
                'location' => $request->url(),
            ],
            'paths' => [
                'inv_work' => env('APP_URL') . 'storage/' . $inv_work,
            ],
            'session_msj' => [
                'error' => session('error_msj'),
                'success' => session('success_msj'),
                'info' => session('info_msj'),
            ],
            'roles' => [
                'is_admin' => $request->user()?->isAdmin(),
                'is_user' => $request->user()?->isUser(),
            ],
        ];
    }
}
