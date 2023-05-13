<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;

class Investations extends Model
{
    use HasFactory, HasRoles;
    protected $table = 'investations';
    protected $primaryKey = 'id';
}
