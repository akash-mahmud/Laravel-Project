<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\Group;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->data['users'] = User::all();

        return view('users.users', $this->data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create()
    {

        $this->data['groups'] = Group::arrayForSelect();

        $this->data['mood'] = 'create';

        return view('users.form', $this->data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(CreateUserRequest $request)
    {
        $data = $request->all();

        if (User::create($data)) {

            Session::flash('message', ' User Created Successfully');

        };

        return redirect('users');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function show($id)
    {

        $this->data['user'] = User::find($id);

        $this->data['tab_menu'] = 'user_info';

        return view('users.show', $this->data);

    }

    public function edit($id)
    {
        $this->data['user'] = User::findOrFail($id);
        $this->data['groups'] = Group::arrayForSelect();
        $this->data['mood'] = 'edit';

        return view('users.form', $this->data);

    }

    /*
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function update(UpdateUserRequest $request, $id)
    {
        $data = $request->all();

        $user = User::findOrFail($id);

        $user->group_id = $data['group_id'];
        $user->name = $data['name'];
        $user->email = $data['email'];
        $user->phone = $data['phone'];
        $user->address = $data['address'];

        if ($user->save()) {

            Session::flash('message', ' User Updated Successfully');

        };

        return redirect('users');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function destroy($id)
    {
        if (User::find($id)->delete()) {

            Session::flash('message', ' User Deleted Successfully');

        };

        return redirect('users');
    }
}
