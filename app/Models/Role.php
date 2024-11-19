<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\Permission\Models\Role as SpatieRole;

class Role extends SpatieRole
{
    use HasFactory;

    protected $hidden = ['created_at', 'updated_at', 'guard_name'];


    public function menus()
    {
        return $this->belongsToMany(Menu::class, 'role_has_menus', 'role_id', 'menu_id');
    }
}
