<?php

namespace App\Http\Controllers;

use App\Models\Subscription;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
class SubscriptionController extends Controller
{
    /**
     * Retrieve the user for the given ID.
     *
     * @param  int  $id
     */
    public function getOne($id)
    {
        return Subscription::findOrFail($id);
    }

    public function create(Request $request) {
        $user = new Subscription();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->last_login = time();
        $user->created_at = time();
        $user->updated_at = time();
        $user->save();
    }

    public function getAll() {
        return response()->json(Subscription::all());
    }

    public function delete($id)
    {
        //Subscription::findOrFail($id)->delete();
        return response()->json('Deleted Successfully', 200);
    }

    public function update($id, Request $request) {
        $user = Subscription::findOrFail($id);
        $user->update($request->all());

        return response()->json($user, 200);
    }
}
