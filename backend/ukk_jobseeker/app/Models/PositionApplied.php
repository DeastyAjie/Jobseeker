<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PositionApplied extends Model
{
    protected $table = 'position_applied';
    protected $primaryKey = 'id';
    public $timestamps = true;

    protected $fillable = [
        'society_id',
        'available_position_id',
        'status',
        'applied_at'
    ];
}
