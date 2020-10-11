<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'product';
    protected $guarded = ['id'];

    public function picture(){
        return $this->hasMany('App\Models\Picture');
    }
    public function stock(){
        return $this->hasMany('App\Models\Stock');
    }
    public function brand(){
        return $this->belongsTo('App\Models\Brand');
    }
}
