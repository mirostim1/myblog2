<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    //
    protected $upload = '/images/';

    protected $fillable = ['path'];

    public function getPathAttribute($photo) {
        return $this->upload . $photo;
    }
}
