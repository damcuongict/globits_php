<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    use HasFactory;

    protected $fillable = ['full_name', 'gender', 'birthdate', 'phone_number', 'address'];
    public function user()
    {
        return $this->hasOne(User::class);
    }
    public function company()
    {
        return $this->belongsTo(Company::class);
    }
}
