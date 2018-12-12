<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    public $protected = "kategoris";
    public $fillable = ['kategori_name'];

    public function buku(){
        return $this->hasMany('App\Buku');
    }
}
