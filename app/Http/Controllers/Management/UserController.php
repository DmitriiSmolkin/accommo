<?php

namespace App\Http\Controllers\Management;

use app\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Requests\StoreUser;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::paginate(15);

        return view('management.users.index', ['users' => $users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('management.users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  StoreUser  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUser $request)
    {
        $user = new User;

        $user->name = $request->get('name');
        $user->email = $request->get('email');
        $user->password = Hash::make($request->get('password'));
        $user->created_at = Carbon::now();
        $user->updated_at = Carbon::now();

        $user->save();

        return redirect(url('management/users'))->with('success', 'Новый пользователь успешно добавлен!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $users = User::all()->where('id', $id);

        return view('management.users.show', ['users' => $users]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $users = User::all()->where('id', $id);

        return view('management.users.edit', ['users' => $users]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     * @throws \Illuminate\Validation\ValidationException
     */
    public function update(Request $request, $id)
    {
        $user = User::find($id);

        // TODO: Optimize shock content

        if(!empty($request->get('name')) && $request->get('name') !== $user->name)
        {
            $this->validate($request, [
                'name' => ['string', 'max:255']
            ]);
            $user->name = $request->get('name');
        }
        if(!empty($request->get('email')) && $request->get('email') !== $user->email)
        {
            $this->validate($request, [
                'email' => ['string', 'email', 'max:255', 'unique:users']
            ]);
            $user->email = $request->get('email');
        }
        if(!empty($request->get('password')) && $request->get('password') !== $user->password)
        {
            $this->validate($request, [
                'password' => ['string', 'min:8']
            ]);
            $user->password = Hash::make($request->get('password'));
        }

        $user->updated_at = Carbon::now();

        $user->save();

        return redirect(url('management/users'))->with('success', 'Данные пользователя успешно обновлены.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);

        if($user->id !== 1) { $user->delete(); }
        else { return redirect(url('management/users'))->with('warning', 'Невозможно удалить владельца!'); }

        return redirect(url('management/users'))->with('success', 'Пользователь успешно удален.');
    }
}
