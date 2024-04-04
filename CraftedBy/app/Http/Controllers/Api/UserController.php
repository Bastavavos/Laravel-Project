<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\StoreUserRequest;
use App\Http\Resources\UserResource;
use App\Models\City;
use App\Models\User;
use App\Models\ZipCode;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * @return JsonResponse
     * @throws AuthorizationException
     */
    public function index()
    {
        $this->authorize('viewAny', User::class);

        $users = UserResource::collection(User::all());

        return response()->json([
            'users' => $users,
            'status' => true
        ]);
    }

    /**
     * @throws AuthorizationException
     */
    public function show($id)
    {
        $this->authorize('view', User::class);

        $user = UserResource::make(User::find($id));
        return response()->json([
            'user' => $user
        ]);
    }

    /**
     * @throws AuthorizationException
     */
    public function update(StoreUserRequest $request, $id)
    {
        $this->authorize('update', User::class);

        $user = User::find($id);
        $user->update($request->all());

        return response()->json([
            'user' => $user
        ]);
    }

    /**
     * @throws AuthorizationException
     */
    public function destroy($id)
    {
        $this->authorize('delete', User::class);

        $user = User::find($id);
        $user->delete();
    }

// switch with function createUser in my AuthController

//    public function store(StoreUserRequest $request)
//    {
//        $arrayRequest = $request->all();
//
//        $zipCode = ZipCode::firstOrCreate(['value' => $arrayRequest['zip_code']]);
//        $city = City::firstOrCreate(['name' => $arrayRequest['city']]);
//
//        $user = new User();
//        $user->firstname = $arrayRequest['firstname'];
//        $user->lastname = $arrayRequest['lastname'];
//        $user->email = $arrayRequest['email'];
//        $user->address = $arrayRequest['address'];
//        $user->password = $arrayRequest['password'];
//
//        $user->city()->associate($city);
//        $user->zipCode()->associate($zipCode);
//
//        $user->save();
//
//        return response()->json([
//           'user'=>$user
//        ]);
//    }

}

