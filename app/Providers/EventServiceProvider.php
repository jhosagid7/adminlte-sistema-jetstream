<?php

namespace App\Providers;

use Illuminate\Support\Facades\Event;
use Illuminate\Auth\Events\Registered;
use JeroenNoten\LaravelAdminLte\Events\DarkModeWasToggled;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use JeroenNoten\LaravelAdminLte\Events\ReadingDarkModePreference;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event to listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
        // Register listener for ReadingDarkModePreference event. We use this
        // event to setup dark mode initial status for AdminLTE package.
        ReadingDarkModePreference::class => [
            ['App\Listeners\AdminLteEventSubscriber', 'handleReadingDarkModeEvt']
        ],
        // Register listener for DarkModeWasToggled AdminLTE event.
        DarkModeWasToggled::class => [
            ['App\Listeners\AdminLteEventSubscriber', 'handleDarkModeWasToggledEvt']
        ],
    ];

    /**
     * Register any events for your application.
     */
    public function boot(): void
    {
        //
    }

    /**
     * Determine if events and listeners should be automatically discovered.
     */
    public function shouldDiscoverEvents(): bool
    {
        return false;
    }
}
