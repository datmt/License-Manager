<?php

namespace App\Http\Controllers;

use App\Helpers\ActivationHelper;
use App\Models\Activation;
use App\Models\Subscription;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
class ActivationController extends Controller
{
    /**
     * Retrieve the user for the given ID.
     *
     * @param  int  $id
     * @return Response
     */
    public function getOne($id)
    {
        return Activation::findOrFail($id);
    }

    public function create(Request $request) {

        if (!$request->has(['license_key', 'machine_id', 'product_id'])) {
            return response()->json(['r' => -1, 'message' => 'missing params'], 200);
        }


        $subscription = Subscription::where('license_key', $request->license_key)->first();

        if (!$subscription)
            return response()->json(['r' => -2, 'message' => 'Invalid license key']);

        if (!$subscription->status)
            return response()->json(['r' => -5, 'message' => 'Subscription disabled!']);

        if ($subscription->product_id != $request->product_id)
            return response()->json(['r' => -3, 'message' => 'Wrong product']);

        if ($subscription->valid_until < time())
            return response()->json(['r' => -4, 'message' => 'License expired']);

        $existingActivation = Activation::where(['subscription_id', $subscription->id, 'machine_id' => $request->machine_id]);

        if (!$existingActivation)
            ActivationHelper::create($subscription->id, $request->machine_id);

        return response()->json(['r' => 0, 'message' => 'Activation success!']);

    }

    public function getAll() {
        return response()->json(Activation::all());
    }

    public function delete($id)
    {
        Activation::findOrFail($id)->delete();
        return response()->json('Deleted Successfully', 200);
    }

    public function update($id, Request $request) {
        $user = Activation::findOrFail($id);
        $user->update($request->all());

        return response()->json($user, 200);
    }
}
