<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable=['category_id','name','description','price','quantity','price2'];
    public function category() {
        return $this->belongsTo(Category::class);
    }
}
