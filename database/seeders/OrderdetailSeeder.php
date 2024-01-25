<?php

namespace Database\Seeders;

use App\Models\Orderdetail;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OrderdetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Orderdetail::factory()->count(10)->create();

    }
}
