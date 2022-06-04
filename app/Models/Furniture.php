<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Furniture extends Model
{
    protected $guarded = ['id'];
    protected $fillable = ['name', 'desc', 'price', 'slug', 'categories_id', 'sold', 'stock'];
    use HasFactory; 

    public function categories(){
        return $this->belongsTo(Categories::class);
    }

    public function ImageFurniture(){
        return $this->hasMany(ImageFurniture::class);
    }
    
    public function list_transaction(){
        return $this->hasMany(list_transaction::class);
    }
}
