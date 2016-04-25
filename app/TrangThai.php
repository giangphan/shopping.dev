<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TrangThai extends Model
{
    protected $table = "trangthai";

    protected $fillable = ['ten'];

    public $timestamps = false;
}
