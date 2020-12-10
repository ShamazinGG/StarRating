<?php

namespace App\Http\Controllers;

use App\Exceptions\UserNotFoundException;
use App\Models\User;
use App\Services\UserService;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::query()->paginate(10);

        return view('Users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'login' => 'required',
            'email' => 'required',
            'password' => 'required',
            'username' => 'required',
            'surname' => 'required',
            'birthdate' => 'required',
            'address' => 'required'

        ]);

        $user = new User([
            'login' => $request->get('login'),
            'email' => $request->get('email'),
            'password' => $request->get('password'),
            'username' => $request->get('username'),
            'surname' => $request->get('surname'),
            'birthdate' => $request->get('birthdate'),
            'address' => $request->get('address'),
        ]);

        $user->save();

        return redirect(Route('user.index'))->with('success', 'Пользователь добавлен!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */

    public function show($id)
    {
        try {
            $user = (new UserService())->findById($id);
        } catch (UserNotFoundException $exception) {
            return view('users.notfound', ['error' => $exception->getMessage()]);
        }

        return view('users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        try {
            $user = (new UserService())->findById($id);
        } catch (UserNotFoundException $exception) {
            return view('users.notfound', ['error' => $exception->getMessage()]);
        }

        return view('users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'login' => 'required',
            'email' => 'required',
            'password' => 'required',
            'username' => 'required',
            'surname' => 'required',
            'birthdate' => 'required',
            'address' => 'required'
        ]);

        $user = User::find($id);
        $user->login = $request->get('login');
        $user->username = $request->get('username');
        $user->surname = $request->get('surname');
        $user->birthdate = $request->get('birthdate');
        $user->email = $request->get('email');
        $user->address = $request->get('address');

        $user->save();

        return redirect(Route('user.index'))->with('success', 'Пользователь обновлён!');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();

        return redirect(Route('user.index'))->with('success', 'Пользователь удалён');
    }
}
