<?php

namespace App\Providers;

use App\Listeners\OptimizeUploadedImage;
use App\Models\Project;
use App\Observers\ProjectObserver;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\ServiceProvider;
use Livewire\Features\SupportFileUploads\FileUploadConfiguration;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Enforce HTTPS in production
        if (config('app.env') === 'production') {
            URL::forceScheme('https');
        }

        // Register model observers
        Project::observe(ProjectObserver::class);

        // Register image optimization listener for file uploads
        Event::listen(
            'livewire.upload-finished',
            OptimizeUploadedImage::class
        );
    }
}
