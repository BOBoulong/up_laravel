<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $table = 'orders';
    protected $fillable = [
        'quantity', 'customer_id','product_id'
    ];
    public function customer() {
        return $this->belongsTo(customer::class);
    }

    public function product() {
        return $this->belongsTo(Product::class);
    }

}