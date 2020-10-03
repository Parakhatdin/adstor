<?php

namespace App\Console\Commands;

use App\Services\CheckPost as Check;
use Illuminate\Console\Command;

class CheckPost extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'check:post';

    protected $check;
    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @param Check $check
     */
    public function __construct(Check $check)
    {
        parent::__construct();
        $this->check = $check;
    }

    /**
     * Execute the console command.
     *
     * @return void
     */
    public function handle()
    {
        $this->check->check();
    }
}
