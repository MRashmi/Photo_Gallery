<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected  $table='images';

    public function description() {
        return $this->hasOne('App\Description','image_id','id');
    }
}
