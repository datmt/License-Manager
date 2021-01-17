<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
class UserController extends Controller
{

    public function init(Request $request) {
        $user = new User;
        $user->name = 'Luka';
        $user->email = 'luis@abc.com';
        $user->password = Hash::make('123456');
        $user->last_login = time();
        $user->created_at = time();
        $user->updated_at = time();
        $user->save();
    }

    public function getOne($id)
    {
        return User::findOrFail($id);
    }

    public function create(Request $request) {

    }

    public function getAll() {
        return response()->json(User::all());
    }

    public function delete($id)
    {
        //User::findOrFail($id)->delete();
        return response()->json('Deleted Successfully', 200);
    }

    public function update($id, Request $request) {
        $user = User::findOrFail($id);
        $user->update($request->all());

        return response()->json($user, 200);
    }
}
