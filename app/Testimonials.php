<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Testimonials extends Model
{
    protected $primaryKey = 'testimonials_id';
    protected $table = 'testimonials';
    protected $fillable = [
        'image',
        'name',
        'company_name',
        'description'
            ];
    protected $hidden = [
        '_token',
    ];
}
