<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Hero_section extends Model
{
    protected $table = 'hero_section';

    protected $fillable = [
        'image',
        'company_name',
        'label',
        'heading',
        'buttons',
    ];
}
