<?php

use App\Admin;
use Illuminate\Database\Seeder;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = Admin::find(1);
        factory(BookSeeder::class, 2)->make()->each(function ($book) use ($admin) {
            $book->admin_id = $admin->id;
            $book->save();
        });
    }
}
