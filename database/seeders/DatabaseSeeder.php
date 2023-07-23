<?php

namespace Database\Seeders;

use App\Models\Comment;
use App\Models\Image;
use App\Models\Social;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

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
        $images = Storage::allFiles('images');

        foreach ($images as $image) {
            if (strpos($image, ".DS_Store"))
                continue;

            Image::factory()->create([
                'file' => $image,
                'dimension' => Image::getDimension($image)
            ]);
        }

        Image::find([1,3,5])->each(function($image){
            User::where('id','!=', $image->user_id)
                ->get()
                ->each(function($user) use ($image){
                    $image->comments()->save(Comment::factory()->make([
                        'user_id' => $user->id
                    ]));
                });
            
        });
        // Image::factory(6)->create();
        User::find([2, 4, 6])->each(function ($user) {
            $user->social()->save(Social::factory()->make());
        });
    }

}