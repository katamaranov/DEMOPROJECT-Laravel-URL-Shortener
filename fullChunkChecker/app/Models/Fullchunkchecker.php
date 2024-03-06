<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use MongoDB\Laravel\Eloquent\Model;

class Fullchunkchecker extends Model
{
    use HasFactory;
    protected $table = 'fullchunkchecker';
    protected $primaryKey = 'table';
}
