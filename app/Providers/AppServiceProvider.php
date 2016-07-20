<?php

namespace App\Providers;

use Illuminate\Database\QueryException;
use Illuminate\Support\ServiceProvider;
use App\User;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //view()->share('numberUser', User::all()->count());
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
