<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    private $to_truncate_tables = [
        'categories', 'comments', 'pages', 'permissions', 'posts', 'roles', 'users'
    ];

    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //Ignore Foreign Key Check
        \DB::statement('SET FOREIGN_KEY_CHECKS=0');

        //Empty DB Tables
        foreach ($this->to_truncate_tables as $table){
            \DB::table($table)->truncate();
        }

        //Reset Foreign Key Check
        \DB::statement('SET FOREIGN_KEY_CHECKS=1');

        $this->call([
            CategoriesTableSeeder::class,
            CommentsTableSeeder::class,
            PagesTableSeeder::class,
            PermissionsTableSeeder::class,
            PostTableSeeder::class,
            RolesTableSeeder::class,
            UsersTableSeeder::class,
            ]);
    }
}
