<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{
    use HasFactory;

    protected $fillable = ['email'];

    public function website()
    {
        return $this->belongsTo(Website::class);
    }

    public function emails()
    {
        return $this->hasMany(PostEmail::class);
    }
}
