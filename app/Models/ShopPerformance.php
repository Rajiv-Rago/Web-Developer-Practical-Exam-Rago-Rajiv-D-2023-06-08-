<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShopPerformance extends Model
{
    use HasFactory;
    protected $table = 'shop_performances';
    protected $fillable = ['total', 'red', 'green', 'blue'];
    protected $guarded = ['id'];
}
