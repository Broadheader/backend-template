<?php

namespace App\Http\Controllers;

use App\Http\Controllers\API\BaseController;
use App\Http\Requests\User\IndexUserRequest;
use App\Models\Client;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(IndexUserRequest $request): JsonResponse  
    {
        //
        $auth = Auth::user();
        if($auth->role->name == 'SUPERADMINISTRATOR')
        {
            $users = User::with('client')->get();
            $success['users'] = $users;
            return $this->sendResponse($success, 'Retrieved Successfully.');
        }
    }

    public function managers()
    {
        $auth = Auth::user();
        if($auth->role->name == 'SUPERADMINISTRATOR')
        {
            $role = Role::where('name', 'ADMINISTRATOR')->first();
            $managers = User::select('id','name')->where('role_id', $role->id )->get();
            $success['managers'] = $managers;
            return $this->sendResponse($success, 'Retrieved Successfully.');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
