<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class SpaBooking extends Model
{
    //
        /**
 * The table associated with the model.
 *
 * @var string
 */
    protected $table = 'spa_bookings';

    protected $fillable = ['arrival_date',  'cost',  'payment', 'spa_id','status', 'user_id'];

    /**
     * Get the gallery that owns the image.
     */
    public function user()
    {
        return $this->belongsTo('App\Model\User');
    }

    public function spa()
    {
        return $this->belongsTo('App\Model\Spa');
    }
}
