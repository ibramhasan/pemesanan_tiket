<?php

namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    use SoftDeletes;

    protected $fillable= ['travel_paket_id', 'image'];
    protected $hidden=[];

    public function travel_package(){
      return $this->belongsTo(TravelPackages::class, 'travel_paket_id', 'id');
    }
}
