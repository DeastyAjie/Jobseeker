<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Portofolio extends Model
{
    protected $table = 'portofolio';
    protected $primaryKey = 'id';
    public $timestamps = true;

    protected $fillable = [
        'society_id',
        'title',
        'description',
        'link'
    ];
}
