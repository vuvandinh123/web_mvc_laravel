<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
       $this->call([
        ProductSeeder::class,
        BrandSeeder::class,
        CategorySeeder::class,
        ContactSeeder::class,
        MenuSeeder::class,
        OrderSeeder::class,
        PostSeeder::class,
        SliderSeeder::class,
        TopicSeeder::class,
        UserSeeder::class
       ]);
    }
}