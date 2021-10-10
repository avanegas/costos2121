<?php

namespace Database\Seeders;

use App\Models\Comment;
use App\Models\Image;
use App\Models\Post;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    
    public function run()
    {
        $posts = Post::factory(30)->create();

        foreach ($posts as $post){
            Image::factory(1)->create([
                'imageable_id' => $post->id,
                'imageable_type' => Post::class
            ]);

            $post->tags()->attach([
                rand(1,6),
                rand(7,12)
            ]);

/*            $number_comments = rand(0, 5);
                for ($i = 0; $i < $number_comments; $i++) {
                    $post->comments()->save($comment = Comment::factory(1)->make([
                        'user_id'=> $post->user->id,
                    //    'parent_id'=>$comment->id,
                        'commentable_id' => $post->id,
                        'commentable_type' => Post::class
                    ]));
            }
*/
        }
    }
}
