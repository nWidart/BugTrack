<?php
class Bug extends Eloquent
{
    protected $table = 'bugs';

    public function user()
    {
        return $this->belongsTo('User');
    }

    public function owner()
    {
        return $this->belongsTo('User');
    }

    public function state()
    {
        return $this->belongsTo('State');
    }
}