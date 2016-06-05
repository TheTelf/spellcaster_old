<?php

class FighterController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		return Response::json(Fighter::get());
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		Fighter::create(array(

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
        //return Response::json(Battle::with('fighters')->where('id', '=', $id)->get());
        //return Response::json(Battle::with('fighters')->where('id', $id)->get());
		$battle = Fighter::with('battle')->where('id', $id)->get();
		//$battle->fighters = $battle->fighters();

        return Response::json(Fighter::where('id', $id)->get());

		//return Response::json(Battle::where('id', $id)->get());
        //return Response::json(Battle::where('id', $id)->get());
	}


}
