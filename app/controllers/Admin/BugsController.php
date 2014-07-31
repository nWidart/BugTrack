<?php namespace Controllers\Admin;

use Bugtrack\Repositories\Bug\BugRepository;
use Bugtrack\Repositories\State\StateRepository;
use View, User, Redirect, Sentry, Input;
use Bugtrack\Services\Validators\Bug as BugValidator;

class BugsController extends \BaseController
{
    private $bug;
    private $state;

    public function __construct(BugRepository $bug, StateRepository $state)
    {
        $this->bug = $bug;
        $this->state = $state;
    }

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function getIndex()
	{
        // Get all the bugs
        $bugs = $this->bug->all();

        return View::make('admin.bugs.index')->with(compact('bugs'));
	}

	public function getCreate()
	{
        // Get the users
        $users = User::all();

        // States
        $states = $this->state->all();

        return View::make('admin.bugs.create')->with(compact('users', 'states'));
	}

    public function postCreate()
    {
        // Validate the bug report
        $validator = new BugValidator;
        if ( $validator->passes() )
        {
            // Create the bug
            $this->bug->create(Input::all());

            // redirect to the bug index page
            return Redirect::to('admin/bugs')->with('success', 'Bug report created.');
        }

        // Redirect with form errors
        return Redirect::back()->withInput()->withErrors($validator->getErrors());
    }

	public function getEdit($id)
	{
        // Get the users
        $users = User::all();

        // States
        $states = $this->state->all();

        // Get the bug
        $bug = $this->bug->find($id);

            return View::make('admin.bugs.edit')->with(compact('users', 'states', 'bug'));
	}

	public function postEdit($id)
	{
        // Validate the bug report
        $validator = new BugValidator;
        if ( $validator->passes() )
        {
            // Update the bug with the new input
            $this->bug->update($id, Input::all());

            // redirect to the bug index page
            return Redirect::to('admin/bugs')->with('success', 'Bug report edited.');
        }

        // Redirect with form errors
        return Redirect::back()->withInput()->withErrors($validator->getErrors());
	}

	public function getDelete($id)
	{
        // Delete the bug
        $this->bug->delete($id);

        // redirect to the bug index page
        return Redirect::to('admin/bugs')->with('success', 'Bug report created.');
	}
}
