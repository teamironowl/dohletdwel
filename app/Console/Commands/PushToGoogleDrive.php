<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\GoogleDrive\Push;

class PushToGoogleDrive extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:pushtogoogledrive';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

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
        if (php_sapi_name() != 'cli') {
            throw new \Exception('This application must be run on the command line.');
        }
        (new Push)->toGoogleDrive();
    }
}
