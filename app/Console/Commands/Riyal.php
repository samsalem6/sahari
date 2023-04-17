<?php

namespace App\Console\Commands;

use GuzzleHttp\Client;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class Riyal extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'riyal:sar';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Saudi Riyal';

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
        $client = new \GuzzleHttp\Client();
        $response = $client->request('GET', 'https://free.currconv.com/api/v7/convert?q=USD_SAR&compact=ultra&apiKey=ec9f1ed767ff46e3d24b');
        $response = $response->getBody()->getContents();
        $obj = json_decode($response, true);
        DB::table('settings')
            ->where('id', 1)
            ->update(['currency' => $obj['USD_SAR']]);

    }
}
