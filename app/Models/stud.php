<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class stud extends Model
{
    use HasFactory;
    protected $table = "studs";
    protected $primarykey = 'id';
    protected $fillable = [
        'lname',
        'fname',
        'midname',
        'age',
        'address',
        'zip'
    ];
}
