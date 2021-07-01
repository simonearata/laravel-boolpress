<?php

use App\Post;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=0; $i < 10; $i++) { 
            
            $new_post = new Post();
            $new_post->title = "Titolo post ".($i + 1);     
            $new_post->slug = Str::slug($new_post->title, '-');
            $new_post->content = ($i + 1) . " Lorem ipsum dolor sit amet consectetur adipisicing elit. Dignissimos assumenda eos dolore minus cumque vel quaerat omnis sapiente? Repellendus similique mollitia ad quod cupiditate praesentium a quas unde adipisci ut.";  
            $new_post->save(); 
        }
    }
}
