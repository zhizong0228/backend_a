<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class productType extends Model
{
    protected $table = 'product_type';

    protected $fillable = [
        'type_name', 'sort'
    ];
}
