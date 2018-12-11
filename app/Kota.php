<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kota extends Model
{
    public $protected = "kotas";
    public $fillable = ['kota_name'];
}
