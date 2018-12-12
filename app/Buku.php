<?php

namespace App;

use App\Library\VariableCollection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class Buku extends Model
{
    protected $table = 'bukus';
    protected $primaryKey = 'id';
    protected $guarded = [];

    public function user(){
        return $this->belongsTo('App\User');
    }

    public function kategori(){
        return $this->belongsTo('App\Kategori');
    }
    
}
