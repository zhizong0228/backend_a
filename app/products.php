<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class products extends Model
{
    protected $table = 'place';

    protected $fillable = [
        'name', 'product_image', 'price', 'info','info_image','date','type_id'
    ];
    public function product_type(){
        return $this->belongsTo('App\productType')
    }
}
