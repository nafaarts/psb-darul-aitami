<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;

use App\Models\User;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        //
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        Gate::define('santri', function (User $user) {
            return $user->hak_akses === 'SANTRI';
        });

        Gate::define('admin', function (User $user) {
            return $user->hak_akses === 'ADMIN';
        });

        Gate::define('guru', function (User $user) {
            return $user->hak_akses === 'GURU';
        });

        Gate::define('admin-guru', function (User $user) {
            return $user->hak_akses !== 'SANTRI';
        });


        // Gate::define('is_own_the_kabkota', function (User $user, Kabkota $kota) {
        //     return $user->id === $kota->user_id';
        // });
    }
}