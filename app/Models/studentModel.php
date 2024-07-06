<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class studentModel extends Model
{
    public $table = 'students';
    public $timestamps = false;
    protected $fillable = [
        'class',
        'roll',
        'name',
        'age',
        'address',
    ];
}
