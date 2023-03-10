<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barangs extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'detail',
        'pendata',
        'tanggal',
        'hari',
        'image'
    ];
}
