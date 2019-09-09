<?php

namespace App\Providers;

use Laravel\Horizon\Horizon;
use Illuminate\Support\Facades\Gate;
use Laravel\Horizon\HorizonApplicationServiceProvider;

class HorizonServiceProvider extends HorizonApplicationServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        // Horizon::routeSmsNotificationsTo('15556667777');
        $mailNotificationsRecipients = config('horizon.notifications.mail');
        if ($mailNotificationsRecipients) {
            Horizon::routeMailNotificationsTo($mailNotificationsRecipients);
        }
        // Horizon::routeSlackNotificationsTo('slack-webhook-url', '#channel');
         Horizon::night();
    }

    /**
     * Register the Horizon gate.
     *
     * This gate determines who can access Horizon in non-local environments.
     *
     * @return void
     */
    protected function gate()
    {
        Gate::define('viewHorizon', function ($user) {
            return in_array($user->email, [
                // todo : customize this value
            ]);
        });
    }
}
