<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;

class Orders extends Model
{
    use HasFactory, HasRoles;
    protected $table = 'orders';
    protected $primaryKey = 'id';
    protected $fillable = [
        'product_id', 
        'user_id',
        'date_order',
        'status_payment'
    ];
}
