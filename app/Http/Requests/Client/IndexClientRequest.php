<?php

namespace App\Http\Requests\Client;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class IndexClientRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        // $auth = Auth::user();
        // if($auth->role->name == 'SUPERADMINISTRATOR' || $auth->role->name == 'ADMINISTRATOR' || $auth->role->name == 'CLIENT' || $auth->role->name == 'CASHIER')
        // {
        //     return true;
        // }
        // else
        // {
        //     return false;
        // }
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            //
        ];
    }
}
