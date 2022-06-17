<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Spa extends Model
{
    protected $table = 'spas';
    protected $fillable = ['name', 'cost', 'duration', 'discount_percentage','image',  'description',  'status'];
    public function spa_bookings()
    {
        return $this->hasMany('App\Model\SpaBooking');
    }
}
