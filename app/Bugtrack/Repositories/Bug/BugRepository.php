<?php namespace Bugtrack\Repositories\Bug;

interface BugRepository
{
    public function all();

    public function find($id);

    public function create($input);

    public function update($bugId, $input);

    public function delete($bugId);
}