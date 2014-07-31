<?php namespace Bugtrack\Repositories\State;

interface StateRepository
{
    public function all();

    public function find($id);
}