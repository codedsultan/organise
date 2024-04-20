<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    public function ticket()
    {
        return $this->belongsTo(Ticket::class, 'product_id');
    }
    public function order(){
        return $this->belongsTo(Order::class,'order_id');
    }
}
