<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        DB::table('inventories')->insert([

            'inventoryID' => Str::random(10),
            'instock' => Str::random(10),
            'outstock' => Str::random(10),
            'date' => Str::random(10),
            'transectionCode' => Str::random(10),
            'cancel' => Str::random(10),
            'status' => Str::random(10),
            'CommonCode' => Str::random(10),

        ]);
    }
}
