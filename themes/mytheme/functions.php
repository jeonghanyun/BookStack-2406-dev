<?php

use BookStack\Facades\Theme;
use BookStack\Theming\ThemeEvents;

// Logs custom message on user login
Theme::listen(ThemeEvents::AUTH_LOGIN, function($method, $user) {
    Log::info("Login via {$method} for {$user->name}");
});

// Adds a `/info` public URL endpoint that emits php debug details
Theme::listen(ThemeEvents::APP_BOOT, function($app) {
    \Route::get('info', function() {
        phpinfo(); // Don't do this on a production instance!
    });
});
