<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    Protected $table='products';
    Protected $fillable=['title','description','file','date','price'];

    public function user(){
        return $this->belongsTo(User::class);
    }
    
}
