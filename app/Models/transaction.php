<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class transaction extends Model
{
    use HasFactory;
    protected $fillable = ['total_price', 'user_id'];
    public function users(){
        return $this->belongsTo(User::class);
    }

    public function list_transaction(){
        return $this->hasMany(list_transaction::class);
    }
}
