<?php  namespace Bugtrack\Repositories\State;

use State;

class EloquentStateRepository implements StateRepository
{
    public function all()
    {
        return State::all();
    }

    public function find($id)
    {
        return State::find($id);
    }
}