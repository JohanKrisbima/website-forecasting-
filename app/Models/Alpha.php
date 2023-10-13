<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alpha extends Model
{
    use HasFactory;
    protected $table = 'alpha';
    protected $fillable = ['id', 'n_alpha'];
}
