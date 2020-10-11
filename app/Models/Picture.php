<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Picture extends Model
{
    use HasFactory;

    protected $table = 'picture';
    protected $guarded = ['id'];

    public function product(){
        return $this->belongsTo('App\Models\Product');
    }
    public function color(){
        return $this->belongsTo('App\Models\Color');
    }
}
