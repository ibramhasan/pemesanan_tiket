<?php

namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use SoftDeletes;

    protected $fillable= ['travel_paket_id', 'users_id', 'additional_vise', 'transaction_total','transaction_status'];
    protected $hidden=[];

    public function details(){
      return $this->hasMany(TransactionDetail::class,'transactions_id','id');
    }
    public function travel_package(){
      return $this->belongsTo(TravelPackages::class,'travel_paket_id','id');
    }
    public function user(){
        return $this->belongsTo(User::class,'users_id','id');
      }
}
