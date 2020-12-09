<?php

namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class TransactionDetail extends Model
{
    use SoftDeletes;

    protected $fillable= ['transactions_id', 'username', 'nationality', 'is_visa', 'do_passport'];
    protected $hidden=[];

    public function transaction(){
      return $this->belongsTo(Transaction::class, 'transactions_id','id');
    }
}
