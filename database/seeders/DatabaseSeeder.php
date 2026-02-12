<?php

namespace Database\Seeders;

use App\Models\Article;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        Article::create([
            'title' => 'Getting Started with Laravel',
            'content' => 'Laravel is a powerful PHP framework that makes building web applications a breeze. It provides elegant syntax, robust tools, and a vibrant ecosystem to help developers create modern applications quickly and efficiently.',
        ]);

        Article::create([
            'title' => 'Understanding Route Model Binding',
            'content' => 'Route Model Binding in Laravel allows you to automatically inject model instances directly into your routes. Instead of manually querying the database, Laravel resolves the model by its primary key and passes it to your closure or controller.',
        ]);

        Article::create([
            'title' => 'Blade Templating Engine',
            'content' => 'Blade is Laravel\'s simple yet powerful templating engine. Unlike other PHP templating engines, Blade does not restrict you from using plain PHP code in your views. All Blade views are compiled into plain PHP code and cached until they are modified.',
        ]);
    }
}
