<?php namespace Bugtrack\Repositories\Bug;

use Bug;

class EloquentBugRepository implements BugRepository
{
    public function all()
    {
        return Bug::all();
    }

    public function find($id)
    {
        return Bug::find($id);
    }

    public function create($input)
    {
        $bug = new Bug;
        // Assign the owner
        $bug->owner_id = \Sentry::getUser()->id;
        // Assign the fields
        $bug->title = $input['title'];
        $bug->description = $input['description'];
        $bug->user_id = $input['user'];
        $bug->state_id = $input['state'];
        $bug->save();

        return $bug;
    }

    public function update($id, $input)
    {
        // Find the bug
        $bug = Bug::findOrFail($id);

        $bug->title = $input['title'];
        $bug->description = $input['description'];
        $bug->user_id = $input['user'];
        $bug->state_id = $input['state'];
        $bug->save();

        return $bug;
    }

    public function delete($bugId)
    {
        // Find the bug
        $bug = Bug::find($bugId);

        return $bug->delete();
    }
}