<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class File extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'description',
        'business_id', 
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
        'deleted_at',
        'business_id',
    ];

    public function business()
    {
        return $this->belongsTo(Business::class);
    }
}
