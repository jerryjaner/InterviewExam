<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    protected $table = 'companies';
    
    protected $fillable = [
        'name',
        'email',
        'logo',
        'website',
    ];

    public function employee(){
        
        return $this->belongsTo(Employee::class)->withDefault();
    }
}

