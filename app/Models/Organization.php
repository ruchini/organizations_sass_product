<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Organization extends Model
{
    protected $fillable = ['code', 'name'];

    public function locations()
    {
        return $this->hasMany(Location::class);
    }
}
