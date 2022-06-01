<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    protected $guarded = ['id'];
    use HasFactory;

    public function Furniture(){
        return $this->hasMany(Furniture::class);
    }
}
