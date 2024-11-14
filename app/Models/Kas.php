<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kas extends Model
{
    use HasFactory;

    protected $fillable = ['student_id', 'nominal', 'date'];  // Changed 'nama' to 'student_id'
    
    protected $casts = [
        'date' => 'date',
        'nominal' => 'decimal:2'
    ];
    
    public function student()
    {
        return $this->belongsTo(Student::class); 
    }
}