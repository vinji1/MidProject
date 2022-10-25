<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function posts(){
        return $this->hasMany(Post::class);
    }
    // public function scopeSearch($query, $terms)
    // {
    //     collect(explode(" ", $terms))
    //     ->filter()
    //     ->each(function($term) use($query){
    //         $term = '%'. $term . '%';

    //         $query->where('category', 'LIKE', $term)
    //             ->orWhere('remarks','LIKE', $term);
    //     });
    // }

   
}
