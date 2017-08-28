<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Work extends Model
{
    protected $fillable = ['activity_id', 'date', 'description', 'time'];
    protected $dates = ['date'];

    public function activity()
    {
        return $this->belongsTo('App\Activity');
    }

    public function getDateAttribute(){
        return Carbon::parse($this->attributes['date'])->format('Y-m-d') ;
    }
}
