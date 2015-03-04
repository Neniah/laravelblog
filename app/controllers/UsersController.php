<?php

class UsersController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
		$users = User::all();

		return View::make('users.index')
			->with('users', $users);

	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
		$roles = array();
		foreach(Role::all() as $role){
			$roles[$role->id] = $role->name;
		}



		return View::make('users.create')
			->with('roles', $roles);


	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
		$validator = Validator::make(Input::all(), User::$rules);

		if($validator->fails()){

			return Redirect::to('users/create')
				->withErrors($validator)
				->withInput();			

		}else{

			
			$user = new User;
			$user->role_id = Input::get('role_id');
			$user->username = Input::get('username');
			$user->email = Input::get('email');
			$user->password = Hash::make(Input::get('password'));
			$user->active = 1;

			$user->save();

			if($user){


				return Redirect::route('home')
					->with('global', 'Cuenta Creada. Muchas gracias.');
			}


			//Session::flash('message', 'Usuario Almacenado correctamente, gracias.');
			//return Redirect::to('users');
		}
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
		$user = User::find($id);

		return View::make('users.show')
			->with('user', $user);
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
		$user = User::find($id);

		$roles = array();
		foreach(Role::all() as $role){
			$roles[$role->id] = $role->name;
		}


		return View::make('users.edit')
			->with('user', $user)
			->with('roles', $roles);
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
		$rules = [
			'username' => 'required',
			'email' => 'unique:users,email,'.$id
		];

		$validator = Validator::make(Input::all(), $rules);

		if($validator->fails()){

			return Redirect::to('users/'.$id.'/edit')
			->withErrors($validator)
			->withInput();

		}else{

			$user = User::find($id);
			$user->role_id = Input::get('role_id');
			

			$user->username = Input::get('username');
			$user->email = Input::get('email');			
			$user->save();

		
			return Redirect::to('users')
				->with('message', 'Usuario editado con éxito :)');

		}
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
		$user = User::find($id);
		$user->delete();

		return Redirect::to('users')
			->with('message', 'Usuario Eliminado.');
	}


}
