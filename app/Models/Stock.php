<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    use HasFactory;

    protected $table = 'stock';
    protected $guarded = ['id'];

    public function product(){
        return $this->belongsTo('App\Models\Product');
    }
    public function color(){
        return $this->belongsTo('App\Models\Color');
    }
    public function size(){
        return $this->belongsTo('App\Models\Size');
    }
}
