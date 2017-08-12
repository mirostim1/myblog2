<?php

namespace App\Http\Controllers;

use App\Http\Requests\AdminCreateUserRequest;
use App\Http\Requests\AdminEditUserRequest;
use App\Photo;
use App\Role;
use App\User;
use Illuminate\Http\Request;

class AdminUsersController extends Controller
{

    public function index()
    {
        $users = User::orderBy('id', 'desc')->paginate(6);

        return view('admin.users.index', compact('users'));
    }

    public function create()
    {
        //
        $roles = Role::pluck('name', 'id')->all();
        return view('admin.users.create', compact('roles'));
    }

    public function store(AdminCreateUserRequest $request)
    {
        //
        $input = $request->all();

        if ($request->photo_id) {
            $file = $request->photo_id;
            $name = time() . $file->getClientOriginalName();
            $file->move('images', $name);
            $photo = Photo::create(['path' => $name]);
            $input['photo_id'] = $photo->id;
        }

        $input['password'] = bcrypt($request->password);

        User::create($input);

        session()->flash('user_created', 'User has been created');

        return redirect('admin/users');
    }

    public function edit($id)
    {
        //
        $user = User::findOrFail($id);

        $roles = Role::pluck('name', 'id')->all();

        return view('admin.users.edit', compact('user', 'roles'));
    }

    public function update(AdminEditUserRequest $request, $id)
    {
        //
        $user = User::findOrFail($id);

        $input = $request->all();

        if (trim($request->password) == '') {
            $input = $request->except('password');
        } else {
            $input['password'] = bcrypt($request->password);
        }

        if ($request->file('photo_id')) {
            $file = $request->file('photo_id');
            $name = time() . $file->getClientOriginalName();
            $file->move('images', $name);
            $photo = Photo::create(['path' => $name]);
            $input['photo_id'] = $photo->id;
        }

        $user->update($input);

        session()->flash('user_updated', 'User has been updated');

        return redirect('/admin/users');
    }

    public function destroy($id)
    {
        //
    }

    public function deleteUsers(Request $request) {

        if(isset($request->delete_selected)) {

            if($request->checkBoxArray == null) {
                return redirect()->back();
            }

            $users = User::findOrFail($request->checkBoxArray);

            foreach($users as $user) {
                if($user->photo_id) {
                    $photo = Photo::findOrFail($user->photo_id);
                    unlink('/home/mirostim1/public_html/myblog' . $user->photo->path);
                    $photo->delete();
                }

                $user->delete();
            }

            session()->flash('users_deleted', 'Selected users have been deleted');

            return redirect('/admin/users');
        }

        if(isset($request->delete_single)) {

            $user = User::findOrFail($request->delete_single);

            if ($user->photo_id) {
                unlink('/home/mirostim1/public_html/myblog' . $user->photo->path);
            }

            $user->delete();

            session()->flash('user_deleted', 'User has been deleted');

            return redirect('/admin/users');
        }
    }
}
