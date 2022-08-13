<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Counter;
class CounterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Counter::factory(1)->create();
    }
}
