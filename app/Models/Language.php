<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Language extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'code', 'locale', 'flag'];

    protected $appends = ['flag_url'];

    public function getFlagUrlAttribute()
    {
        return asset('images/flags/' . $this->flag . '_flag.jpg');
    }
}
