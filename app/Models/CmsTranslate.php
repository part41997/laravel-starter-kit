<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CmsTranslate extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'content', 'language_id'];

    public function cms()
    {
        return $this->belongsTo(Cms::class);
    }

    public function language()
    {
        return $this->belongsTo(Language::class);
    }
}
