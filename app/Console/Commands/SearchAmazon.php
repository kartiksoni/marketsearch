<?php

namespace App\Console\Commands;

use App\Providers\AmazonProvider;
use Illuminate\Console\Command;

class SearchAmazon extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'search:amazon {query}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Search amazon and add the results of the search to the product table';

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
        $query = $this->argument('query');
        $amazon = \Amazon::search($query);
       //$this->line('Welcome to the user generator.');
    }

  
}
