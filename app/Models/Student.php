<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function scopeSearch($query, $terms)
    {
        collect(explode(" ", $terms))
        ->filter()
        ->each(function($term) use($query){
            $term = '%'. $term . '%';

            $query->where('name', 'LIKE', $term)
                ->orWhere('address','LIKE', $term)
                ->orWhere('contact_number','LIKE', $term)
                ->orWhere('email','LIKE', $term);
        });
    }
}
