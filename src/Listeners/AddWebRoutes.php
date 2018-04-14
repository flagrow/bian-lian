<?php

namespace Flagrow\Masquerade\Listeners;

use Flagrow\Masquerade\Http\Controllers\ManageProfileController;
use Flagrow\Masquerade\Http\Controllers\ViewProfileController;
use Flarum\Event\ConfigureForumRoutes;
use Illuminate\Contracts\Events\Dispatcher;

class AddWebRoutes
{
    /**
     * @param Dispatcher $events
     */
    public function subscribe(Dispatcher $events)
    {
        $events->listen(ConfigureForumRoutes::class, [$this, 'routes']);
    }

    /**
     * @param ConfigureForumRoutes $routes
     */
    public function routes(ConfigureForumRoutes $routes)
    {
        $routes->get(
            '/profile/configure',
            'masquerade.profile.configure',
            ManageProfileController::class
        );
        $routes->get(
            '/u/{username}/profile',
            'masquerade.profile.view',
            ViewProfileController::class
        );
    }
}
