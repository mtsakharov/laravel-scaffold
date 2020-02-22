<?php
namespace LaravelScaffold\Providers;

use App\Console\Commands\Scaffold;
use Illuminate\Support\ServiceProvider;

/**
 * Class ScaffoldPublishProvider
 * @package LaravelScaffold\Providers
 */
class ScaffoldPublishProvider extends ServiceProvider
{

    /**
     * Commands list to be registered
     *
     * @var array
     */
    private $commandsList = [
        Scaffold::class
    ];

    public function register() {

    }

    public function boot() {
        if ($this->app->runningInConsole()) {
            $this->commands($this->commandsList);
        }
    }
}