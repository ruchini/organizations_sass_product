<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Device extends Model
{
    protected $fillable = ['type', 'image', 'date_created', 'status', 'location_id'];
    public function location()
    {
        return $this->belongsTo(Location::class);
    }
}