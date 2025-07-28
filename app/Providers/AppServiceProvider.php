<?php

namespace App\Providers;

use App\Models\Message;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

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
View::composer('*', function ($view) {
        $headerMessages = Message::latest()->take(5)->get();
        $unreadCount = Message::where('is_read', false)->count(); // <-- yeh line

        $view->with([
            'headerMessages' => $headerMessages,
            'unreadMessageCount' => $unreadCount, // <-- yeh pass ho raha
        ]);
    });
        //
    }
}
