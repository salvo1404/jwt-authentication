<?php

namespace App\Http\Requests;

use JWTAuth;

class UserEditRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return JWTAuth::parseToken()->authenticate();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'first_name' => 'sometimes|string',
            'last_name'  => 'sometimes|string',
            'email'      => 'sometimes|string',
            'password'   => 'sometimes|string',
            'employer'   => 'sometimes|string',
            'state'      => 'sometimes|string',
        ];
    }
}
