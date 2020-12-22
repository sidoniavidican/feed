<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    protected $fillable = [
        'content', 'position', 'feed_id'
    ];

    public function feed()
    {
        return $this->belongsTo('App\Feed');
    }
}
