<?php

namespace App\Console\Commands;

use App\Classes\Core;
use Illuminate\Console\Command;

class ThrowToOlympic extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'throwTo:update';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {


        $this->info(Core::DataCollectors());
        $this->info(Core::FailedDataRePuller());

        $this->info('Hourly Update has been send successfully');
    }
}
