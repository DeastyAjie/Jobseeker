<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AvailablePosition extends Model
{
    use HasFactory;

    protected $table = 'available_position'; // kalau migrationmu pakai singular, biarkan ini
    protected $primaryKey = 'id';
    public $timestamps = true;

    protected $fillable = [
        'company_id',
        'title',
        'description',
        'salary',
        'deadline',
        'status'   // tambahkan biar bisa insert status
    ];
}
