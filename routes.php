<?php

use Backbone\Database\Migrator;
use Backbone\Database\Seeder;
use Backbone\Http\Route;

return [
    // Scripts
    '/seed' => [
        'GET'  => function () {
            if (APP_ENV == 'dev') {
                Seeder::run();
                echo line("Database seeded successfully.");
            }
        },
    ],
    '/migrate' => [
        'GET'  => function () {
            if (APP_ENV == 'dev') {
                Migrator::run();
                echo line("Database migrated successfully.");
            }
        },
    ],
    '/reset' => [
        'GET'  => function () {
            if (APP_ENV == 'dev') {
                Migrator::run();
                Seeder::run();
                echo line("Database reset and seeded successfully.");
            }
        },
    ],
    // Tests
    '/sandbox' => [
        'GET'  => function () {
            if (APP_ENV == 'dev') {
                require_once __DIR__ . '/public/sandbox.php';
            }
        },
    ],
    '/hello' => [ // Example route with a closure
        'GET'  => function ($request) {
            $name = $request->params['name'] ?? 'Guest';
            echo "Hello $name!";
        },
    ],
    // Views
    '/' => [
        'GET'  => new Route('View\\HomeController@index'),
    ],
    '/posts' => [
        'GET'  => new Route('View\\PostController@index'),
    ],
    '/posts/{id}' => [
        'GET'  => new Route('View\\PostController@show'),
        'PUT'  => new Route('View\\PostController@update'),
        'DELETE'  => new Route('View\\PostController@delete'),
    ],
    // API
    '/api' => [
        'GET'  => new Route('API\\DefaultController@index'),
    ],
    '/api/posts' => [
        'GET'  => new Route('API\\PostController@index'),
    ],
    '/api/posts/{slug}' => [
        'GET' => new Route('API\\PostController@show'),
    ],
    '/api/categories' => [
        'GET'  => new Route('API\\CategoryController@index'),
    ],
    '/api/categories/{slug}' => [
        'GET' => new Route('API\\CategoryController@show'),
    ],
];
