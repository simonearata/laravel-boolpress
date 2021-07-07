<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'title',
        'content',
        'slug',
        'category_id'
    ];

    // nel controller faremo una query di questo tipo:
    // $post = Post::find($id)
    // $posts->category <<<-------- in questo modo ho il risultato della relazione
    // per avere questo risultato creare questa funzione:

    public function category(){
        
        return $this->belongsTo('App\Category');
    }

    public function tags(){
        return $this->belongsToMany('App\Tag');
    }
}
