<?php

namespace App\Transformers;


use League\Fractal\TransformerAbstract;

class AuthenticationTransformer extends TransformerAbstract
{
    /**
     * @param $authData
     *
     * @return array
     * @internal param User $user
     * @internal param String $token
     *
     */
    public function transform($authData)
    {
        $user = $authData['user'];

        return [
            'token'      => $authData['token'],
            'id'         => $user->id,
            'first_name' => $user->first_name,
            'last_name'  => $user->last_name,
            'email'      => $user->email,
            'links'      => [
                [
                    'rel' => 'logout',
                    'uri' => route('api.auth.logout'),
                ]
            ]
        ];
    }
}
