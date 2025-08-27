<?php

use Illuminate\Foundation\Application;
use Illuminate\Filesystem\Filesystem;

$app = new Application(
    $_ENV['APP_BASE_PATH'] ?? dirname(__DIR__)
);

// Ensure the 'files' binding exists early so service providers that
// check for cached routes/config (for example Sanctum) can use it
// during the boot sequence. This avoids "Target class [files] does not exist."
// which can occur if providers run before the filesystem is bound.
if (! $app->bound('files')) {
    $app->singleton('files', function () {
        return new Filesystem();
    });
}

$app->singleton(
    Illuminate\Contracts\Http\Kernel::class,
    App\Http\Kernel::class
);

$app->singleton(
    Illuminate\Contracts\Console\Kernel::class,
    App\Console\Kernel::class
);

$app->singleton(
    Illuminate\Contracts\Debug\ExceptionHandler::class,
    App\Exceptions\Handler::class
);

return $app;
