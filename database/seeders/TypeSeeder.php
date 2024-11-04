<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

// Helpers
use Illuminate\Support\Facades\Schema;

// Model
use App\Models\Type;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Schema::withoutForeignKeyConstraints(function () {
            Type::truncate();
        });
        
        for ($i=0; $i<5; $i++) {
            $type = Type::create([
                'name' => fake()->word(),
            ]);
        }
    }
}
