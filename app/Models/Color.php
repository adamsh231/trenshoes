<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Color extends Model
{
    use HasFactory;

    protected $table = 'color';
    protected $guarded = ['id'];

    public function picture(){
        return $this->hasMany('App\Models\Picture');
    }
    public function stock(){
        return $this->hasMany('App\Models\Stock');
    }
}
