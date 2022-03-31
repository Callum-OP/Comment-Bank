<?php

use Illuminate\Database\Seeder;
use App\Terminology;

class TerminologyTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Terminology::class, 10)->create();  // create 10 dummy users
    }
}
