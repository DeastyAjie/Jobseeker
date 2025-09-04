<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $table = 'users';            // nama tabel
    protected $primaryKey = 'id';          // primary key
    public $timestamps = false;            // kalau tabel tidak ada created_at & updated_at

    protected $fillable = [
        'name',
        'email',
        'password',
        'role'
    ];
}
