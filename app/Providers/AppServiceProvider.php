<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        \Blade::directive('datetimeActivity', function($expression) {
            setlocale (LC_ALL, 'fr_FR.utf8','fra');
            $date = date_create($expression)->format('d/m/Y à h:i:s');
            return "<?php echo 'Le $date' ?>";
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
