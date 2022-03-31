<?php

use Illuminate\Database\Seeder;
use App\Results;

class ResultsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Results::class, 10)->create();  // create 10 dummy users
    }
}
