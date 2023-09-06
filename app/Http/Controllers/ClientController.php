<?php

namespace App\Http\Controllers;

use App\Http\Controllers\API\BaseController;
use App\Http\Requests\Client\IndexClientRequest;
use App\Http\Requests\Client\StoreClientRequest;
use App\Models\Client;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClientController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(IndexClientRequest $request): JsonResponse
    {
        //
        $auth = Auth::user();

        if($auth->role->name == 'CLIENT')
        {
            $client = Client::where('user_id', $auth->id)->with('clientSubscription')->first();
            $success['client'] = $client;
            return $this->sendResponse($success, 'Retrieved Successfully.');
        }
        elseif($auth->role->name == 'SUPERADMINISTRATOR')
        {
            $clients = Client::with('user', 'clientSubscriptions','clientSubscriptions.subscription', 'cars', 'history', 'clientPoint')->get();
            $success['clients'] = $clients;
            return $this->sendResponse($success, 'Retrieved Successfully.');
        }
        elseif($auth->role->name == 'ADMINISTRATOR')
        {
            $clients = Client::where('branch_id', $auth->branch->id)->with('clientPoint')->get();
            $success['clients'] = $clients;
            return $this->sendResponse($success, 'Retrieved Successfully.');
        }
        else
        {
            return $this->sendError('Unauthorised.', ['error'=>'Unauthorised']);
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
    public function store(StoreClientRequest $request)
    {
        //
        $user = User::create(
            array_merge([
                'role_id' => 5,
                
            ], $request->validated())
            );
        $client = Client::create(
            array_merge(
                ['user_id' => $user->id], $request->validated()
            )
        );
        $success['client'] = $client;
        return $this->sendResponse($success, 'Saved Successfully.');

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
