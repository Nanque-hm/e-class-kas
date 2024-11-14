<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    public function rombel(){
        return $this->belongsTo(rombel::class);
        
    }
    public function kas()
    {
        return $this->hasMany(Kas::class);
    }
}
