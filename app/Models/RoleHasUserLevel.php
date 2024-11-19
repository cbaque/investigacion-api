<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoleHasUserLevel extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = ['role_id', 'user_level_id'];
}
