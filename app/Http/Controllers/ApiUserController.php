<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\ApiUser;
use App\Models\Token;
use App\Services\LogWriter;
use Illuminate\Http\Request;

class ApiUserController extends Controller
{
    // List of users
    public function index()
    {
        $users = ApiUser::with('tokens')->latest()->get();
        return view('api-user.index',compact('users'));
    }

    // user add page
    public function add()
    {
        return view('api-user.add');
    }

    public function toggleUserActivation($id)
    {
        $user = ApiUser::where('id',$id)->first();
        return [
            'is_active' => $user->toggleUserActivation()
        ];
    }

    public function toggleTokenActivation($id)
    {
        $token = Token::where('id',$id)->first();
        return [
            'is_active' => $token->toggleTokenActivation()
        ];
    }

    public function show($id)
    {
        $tokens = Token::where('api_user_id',$id)->get();
        return view('api-user.show',compact('tokens'));

    }

    // user create
    public function create(Request $request)
    {
        $this->validate($request,[
            'name' => ['required', 'string', 'max:999999', 'unique:api_users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'token_valid_period' => ['required', 'integer','max:1000','min:1'],
        ]);

        $user = ApiUser::create(array_merge($request->all(),[
            'created_by' => auth()->id(),
            ]));

        $activity = "\nCreated by: ".json_encode(auth()->user())
            ."\nNew ApiUser: ".json_encode($user);

        LogWriter::user_activity($activity,'AddingApiUsers');

        return redirect()->route('api-userIndex');
    }

    // user edit page
    public function edit($id)
    {
        $user = ApiUser::find($id);
        return view('api-user.edit',compact('user'));
    }

    // update user dates
    public function update(Request $request, $id)
    {

        $this->validate($request,[
            'name' => ['required', 'string', 'max:255', 'unique:api_users,name,'.$id],
            'password' => ['nullable', 'string', 'min:8', 'confirmed'],
            'token_valid_period' => ['nullable', 'integer','max:180','min:1'],
        ]);

        $user = ApiUser::find($id);
        $activity = "\nUpdated by: ".logObj(auth()->user());
        $activity .="\nBefore updates ApiUser: ".logObj($user);

        if (is_null($request->password)) unset($request['password']);
        $user->fill($request->all());
        $user->save();

        $activity .="\nAfter updates ApiUser: ".logObj($user);

        LogWriter::user_activity($activity,'EditingApiUsers');

        if (auth()->user()->can('api-user.edit'))
            return redirect()->route('api-userIndex');
        else
            return redirect()->route('home');
    }

    // delete user by id
    public function destroy($id)
    {
        $user = ApiUser::findOrFail($id);
        $user->deleteTokens();
        $user->delete();
        $deleted_by = logObj(auth()->user());
        $user_log = logObj($user);
        $message = "\nDeleted By: $deleted_by\nDeleted user: $user_log";
        LogWriter::user_activity($message,'DeletingApiUsers');
        success_message("$user->name is deleted");
        return redirect()->route('api-userIndex');
    }

    // delete user token by id
    public function destroyToken($id)
    {

        $token = Token::findOrFail($id);
        $token->delete();
        $deleted_by = logObj(auth()->user());
        $user_log = logObj($token);
        $message = "\nDeleted By: $deleted_by\nDeleted user: $user_log";
        LogWriter::user_activity($message,'DeletingApiUsers');
        success_message('Token is deleted');
        return redirect()->back();
    }
}
