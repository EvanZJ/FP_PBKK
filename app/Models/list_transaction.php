<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class list_transaction extends Model
{
    use HasFactory;

    public function furniture(){
        return $this->belongsTo(Furniture::class);
    }

    public function transaction(){
        return $this->belongsTo(transaction::class);
    }

}
