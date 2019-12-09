<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ScrapModel extends Model
{
    protected $table = "tb_crypto";
    protected $fillable = ['id','name','symbol','price','marcap','vol24h','voltot','chg24h','chg7d','created'];
}
