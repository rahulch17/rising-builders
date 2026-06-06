<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Company_directions extends Model
{
    protected $table = 'company_directions';

    protected $fillable = [
        'vision',
        'mission',
        'icon',
    ];
}
