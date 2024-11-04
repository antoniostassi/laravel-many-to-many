<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

// Model
use App\Models\Project;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Project::truncate();
        
        for($i=0; $i<10;$i++) {

            $projectName = fake()->sentence(); // Nome progetto
            $sluggedName = str()->slug($projectName); // Slug per nome

            Project::create([
                'name' => $projectName,
                'description' => fake()->paragraph(),
                'slug' => $sluggedName,
                'creation_date' => date('Y/m/d h/i/m'),
                'expiring_date' => fake()->dateTimeThisMonth('+30 days'),
                'label_tag' => fake()->word(),
                'price' => rand(0, 1000),
                'completed' => fake()->boolean(),
            ]);

        }
    }
}
