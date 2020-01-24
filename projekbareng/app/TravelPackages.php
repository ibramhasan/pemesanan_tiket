<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TravelPackages extends Model
{
    protected $table= "travel_packetages";
    use SoftDeletes;

    protected $fillable = ['title', 'slug', 'lokasi', 'about', 'featured_event',
    'language', 'foods', 'departure_date', 'duration', 'type', 'price'];

    protected $hidden= [

    ];

    public function galleries(){
      return $this->hasMany(Gallery::class, 'travel_paket_id', 'id');
    }
}
