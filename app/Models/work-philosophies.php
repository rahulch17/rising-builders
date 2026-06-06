<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Work_philosophies extends Model
{
    protected $table = 'work_philosophies';

    protected $fillable = [
        'philosophy_text',
        'features',
        'policies',
    ];
}
