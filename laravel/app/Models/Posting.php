<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Posting extends Model
{
    protected $fillable = [
            'deskripsi','foto','slug','kabupaten_id'
        ];
    public function user(){
        return $this->belongsTo('App\Models\User');
    }

    public function kabupaten(){
        return $this->belongsTo('App\Models\Kabupaten');
    }

    public function makanan(){
        return $this->hasMany('App\Models\Makanan');
    }

    public function rumah(){
        return $this->hasMany('App\Models\Rumah');
    }

    public function tarian(){
        return $this->hasMany('App\Models\Tarian');
    }

    public function senjata(){
        return $this->hasMany('App\Models\Senjata');
    }
    
    public function lokasi(){
        return $this->hasMany('App\Models\Lokasi');
    }

    public function music(){
        return $this->hasMany('App\Models\Music');
    }

    public function pakaian(){
        return $this->hasMany('App\Models\Pakaian');
    }

    public function bahasa(){
        return $this->hasMany('App\Models\Bahasa');
    }

    public function comment(){
        return $this->hasMany('App\Models\Comment');
    }

}
