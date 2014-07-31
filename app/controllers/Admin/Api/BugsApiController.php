<?php namespace Controllers\Admin\Api;

use Bugtrack\Repositories\Bug\BugRepository;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Response;
use Bugtrack\Services\Validators\Bug as BugValidator;

class BugsApiController extends \BaseController
{
    private $bug;

    public function __construct(BugRepository $bugs)
    {
        $this->bug = $bugs;
    }
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		return $this->bug->all();
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
        // Validate the bug report
        $validator = new BugValidator;
        if ( $validator->passes() )
        {
            // Update the bug with the new input
            $bug = $this->bug->update($id, Input::all());

            return Response::json($bug, 201);
        }

        // Redirect with form errors
        return Response::json(['error' => 'testError']);
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
        $this->bug->delete($id);
		return Response::json(['Bug deleted']);
	}


}
