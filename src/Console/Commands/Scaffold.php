<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;

/**
 * Class Scaffold
 * @package App\Console\Commands
 */
class Scaffold extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'scaffold:generate {name}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate application files';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $name = $this->argument('name');

        if (!$name) {
            $this->error("Name not defined");

            return;
        }

        Artisan::call("make:model Models/{$name} -mcr --api");
        Artisan::call("make:request Store{$name}Request");
        Artisan::call("make:request Update{$name}Request");

    }
}
