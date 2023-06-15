<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;

class Customers extends Model
{
    use HasFactory, HasRoles;
    protected $table = 'customers';
    protected $primaryKey = 'id';

    public function posts()
    {
        return $this->hasMany(Post::class);
    }

}