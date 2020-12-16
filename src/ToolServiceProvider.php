<?php

namespace Mastani\NovaPasswordReset;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;
use Laravel\Nova\Events\ServingNova;
use Laravel\Nova\Nova;
use Mastani\NovaPasswordReset\Http\Middleware\Authorize;

class ToolServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
      if ($this->app->runningInConsole()) {
          // Config
          $this->publishes([
                             __DIR__ . '/../config/nova-password-reset.php' => config_path('nova-password-reset.php'),
                           ], 'config');

          $this->publishes([
                             __DIR__.'/../resources/views/partials' => resource_path('views/vendor/nova/partials'),
                           ], 'nova-views');
        }

        $this->loadViewsFrom(__DIR__.'/../resources/views', 'nova-password-reset');

        $this->app->booted(function () {
            $this->routes();
        });

        Nova::serving(function (ServingNova $event) {
            //
        });

      // Load translations
      $this->translations();
    }

    /**
     * Register the tool's routes.
     *
     * @return void
     */
    protected function routes()
    {
        if ($this->app->routesAreCached()) {
            return;
        }

        Route::middleware(['nova', Authorize::class])
                ->prefix('nova-vendor/nova-password-reset')
                ->group(__DIR__.'/../routes/api.php');
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

  protected function translations()
  {
    if ($this->app->runningInConsole())
    {
      $this->publishes([__DIR__ . '/../resources/lang' => resource_path('lang/vendor/nova-password-reset')],
                       'translations');
    }
    elseif (method_exists('Nova', 'translations'))
    {
      $locale = app()->getLocale();
      $fallbackLocale = config('app.fallback_locale');

      if ($this->attemptToLoadTranslations($locale, 'project')) return;
      if ($this->attemptToLoadTranslations($locale, 'local')) return;
      if ($this->attemptToLoadTranslations($fallbackLocale, 'project')) return;
      if ($this->attemptToLoadTranslations($fallbackLocale, 'local')) return;
      $this->attemptToLoadTranslations('en', 'local');
    }
  }
  protected function attemptToLoadTranslations($locale, $from)
  {
    $filePath = $from === 'local'
      ? __DIR__ . '/../resources/lang/' . $locale . '.json'
      : resource_path('lang/vendor/nova-password-reset') . '/' . $locale . '.json';
    $localeFileExists = File::exists($filePath);
    if ($localeFileExists) {
      Nova::translations($filePath);
      return true;
    }
    return false;
  }
  }
