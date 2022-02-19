<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orderitem extends Model
{
    use HasFactory;
    Protected $fillable=['order_id','prod_id','Quantity','price'];
    public function Order(){
        return $this->belongsTo(Order::class);
    }
}
