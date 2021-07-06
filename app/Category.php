<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    // se faccio una query così: $categories = Category::find($id)
    // alla proprietà $category->posts voglio avere una array dei post in relazione

    public function posts(){
        
        return $this->hasMany('App\Post');
    }
}
