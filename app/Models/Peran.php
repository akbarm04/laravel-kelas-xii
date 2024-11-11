<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Peran extends Model
{
    use HasFactory;
    protected $table = 'perans';
    protected $fillable = ['actor', 'film_id', 'cast_id', 'role_name'];

    public function cast()
    {
        return $this->hasOne(cast::class, 'id', 'cast_id');
    }

    public function film()
    {
        return $this->belongsTo(Film::class, 'film_id');
    }

}
