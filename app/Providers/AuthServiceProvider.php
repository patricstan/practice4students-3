<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;

use App\Models\Offer;
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
        Gate::define('manage-offers', function (User $user, Offer $offer) {
            return $user->company->id == $offer->company_id;
        });

        Gate::define('apply-to-offer', function (User $user, Offer $offer) {
            $student = $user->student()->first();
            // dd(!$offer->students()->find($student->id, ['student_id']));
            return !$offer->students()->find($student->id, ['student_id']);
        });
    }
}
