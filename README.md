<p align="center">
  <img src="https://raw.githubusercontent.com/LalbaAnthony/backbone-php/main/.github/assets/backbone-php-logo-light.svg" alt="Backbone PHP Logo" width="150"/>
</p>
<br>

# Backbone PHP

This is a simple PHP framework for building web applications.
Just a pure mix of Laravel, Symfony, ... with a bit of my own touch.

It isnt mean to be used in production (at least for now), since it might be buggy and not secure enough.

Basically, its a learning project to figure out how a framework can work under the hood and how to build one from scratch.

## 🚀 Quick start

- Copy the `.env.example` file to `.env` and set your environment variables.
- Start project with `script-setup.*`
- Run the migration and seed the initial data.

## 📐 Architecture

There is no `vendor/` folder since this project is dependency free (and will always be).

## ⌨️ Code

### Models

Usage example:

```php
// =========================
// Creating a new Post
// =========================

$post = new Post([
    'title' => 'My first post',
    'content' => 'This is the content of my first post.',
]);
$post->save(); // Inserts a new record and sets the ID, created_at, updated_at fields
dump($post->id); // Newly assigned ID
dump($post->created_at); // Automatically set

// =========================
// Retrieving a Post by ID
// =========================

$post = Post::findByPk($post->id);
dump($post);
```

### Seeders

Seeder uses JSON files to populate the database with initial data.

Seeding data is located in the `app/Seeds/` folder.
All files are named after the table they seed with the order prefix to define the order of execution. Example: `001-users.json`, `002-posts.json`, ...

Order and table name are separated by `-` character.

### Aliases

You can define class aliases in `aliases.php` to simplify class references throughout your application.

### Icons

All icons are stored in `ressources/icons` and come from [Lucide Icons](https://lucide.dev/).
Can download them at https://github.com/mallardduck/blade-lucide-icons/tree/main/resources/svg.