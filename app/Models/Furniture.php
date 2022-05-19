<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Furniture extends Model
{
    protected $guarded = ['id'];
    use HasFactory; 
    public function categories(){
        return $this->belongsTo(Categories::class);
    }
}
