<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ImageFurniture extends Model
{
    protected $guarded = ['id'];
    use HasFactory;
    public function furniture(){
        return $this->belongsTo(Furniture::class);
    }
}
