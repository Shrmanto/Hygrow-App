<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;

class InvestDetails extends Model
{
    use HasFactory, HasRoles;
    protected $table = 'invest_details';
    protected $primaryKey = 'id';
}
 