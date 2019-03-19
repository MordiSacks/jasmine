<?php

namespace Jasmine\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;

class Migrate extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'jasmine:migrate';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'migrate jasmine tables';

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
        Artisan::call('migrate', [
            '--realpath' => true,
            '--path'     => __DIR__ . '/../../../inc/database/migrations',
        ], $this->getOutput());
    }
}
