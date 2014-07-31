<?php
class State extends Eloquent
{
    public function bugs()
    {
        return $this->hasMany('Bug');
    }
}