<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;

class Partners extends Model
{
    use HasFactory, HasRoles;
    protected $table = 'partners';
    protected $primaryKey = 'id';
    protected $fillable = [
        'code_partners',
        'address',
        'phone_number',
        'user_id',
    ];
}
