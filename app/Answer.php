<?php

namespace App;
use Carbon;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
     public function question()
    {
        return $this->belongsTo(Question::class);
    }

    public function user()
    {
       return $this->belongsTo(User::class);

    }

    public function getBodyHtmlAttribute()
    {
        return \Parsedown::instance()->text($this->body);
    }

    public function getCreatedDateAttribute()
    {
        //return $this->created_at->diffForHumans();
        return Carbon\Carbon::parse( $this->created_at)->diffForHumans();

    }
}
