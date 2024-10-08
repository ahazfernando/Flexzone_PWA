<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = [
        'customer_id',
        'product_id',
        'pro_name',
        'pro_price',
        'cus_name',
        'cus_email',
        'cus_phone',
        'cus_address',
        'pro_image',
    ];
}
