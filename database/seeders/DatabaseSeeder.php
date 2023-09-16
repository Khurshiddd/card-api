<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Card;
use App\Models\Desk;
use App\Models\DeskList;
use App\Models\Task;
use App\Models\User;
use Database\Factories\DeskListFactory;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
         User::factory(10)->create();
         for ($i = 0; $i < 10; $i++){
             Desk::factory(10)->create();
         }
         for ($i = 0; $i < 10; $i++){
             DeskList::factory(10)->create();
         }
         for ($i = 0; $i < 10; $i++){
             Card::factory(10)->create();
         }
         for ($i = 0; $i < 10; $i++){
             Task::factory(10)->create();
         }

    }
}
