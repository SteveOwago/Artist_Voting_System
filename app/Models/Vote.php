<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vote extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'phone',
        'id_number',
        'artist_id',
        'ip_address',
        'region_id',
        'created_at',
        'updated_at',
    ];
}
