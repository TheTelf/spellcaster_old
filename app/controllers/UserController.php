<?php

class UserController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		return Response::json(User::get());
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		User::create(array(

		));

		return Response::json(array('success' => true));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function show($id)
	{
        return Response::json(User::find($id));

        /*return Response::json(Battle::with(['fighters.user'
			=> function ($query) {
					$query->orderBy('fighters.team');
				}]
		)->find($id));*/
	}


}
