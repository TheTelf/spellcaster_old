<?php

class BattleController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		return Response::json(Battle::get());
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		Battle::create(array(

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
        return Response::json(Battle::with('fighters.user')->find($id));

        /*return Response::json(Battle::with(['fighters.user'
			=> function ($query) {
					$query->orderBy('fighters.team');
				}]
		)->find($id));*/
	}

	public function takeAction(Request $request, $id)
	{
		return true;

		if ($request->spell == null)
		{
			//just an attack
			DB::table('fighters')->decrement('HP', 10)->where('battle_id', $id)->where('id', $request->target);
		}

	}


}
