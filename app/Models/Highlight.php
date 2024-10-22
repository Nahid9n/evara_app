<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Highlight extends Model
{
    use HasFactory;
    public function products(){
        return $this->hasMany(Product::class,'id','product_id');
    }
    public function productHighlight()
    {
        return $this->hasMany(ProductHighlight::class);
    }
}
