<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Komentar extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $with = ['user', 'diskusi'];

    public function diskusi()
    {
        return $this->belongsTo(Diskusi::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
