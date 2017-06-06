<?php

namespace App\Console\Commands;

use App\Providers\EbayProvider;
use App\Providers\AmazonProvider;
use Illuminate\Console\Command;

class Search extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'search {query}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Search all search providers';

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
        $ebay = \Ebay::search($query);
        $amazon = \Amazon::search($query);

    }
}
