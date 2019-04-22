<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    /**
     * Attributes to guard against mass-assignment.
     *
     * @var array
     */
    protected $guarded = [];

    //
    public function plant()
    {
        return $this->belongsTo(Plant::class);
    }
}
