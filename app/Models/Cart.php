<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;
    protected $fillable = [
        'cus_name',
        'cus_email',
        'cus_phone',
        'cus_address',
        'pro_name',
        'pro_price',
        'pro_image',
        'customer_id',
        'product_id',
    ];
}
