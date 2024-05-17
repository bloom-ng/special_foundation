<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class newsletter extends Model
{
    use HasFactory;

    // Specify the table if it does not follow the naming convention
    protected $table = 'newsletter';

    // Specify fillable attributes if using mass assignment
    protected $fillable = ['name', 'email'];

}
