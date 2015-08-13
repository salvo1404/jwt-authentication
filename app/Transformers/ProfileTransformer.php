<?php

namespace App\Transformers;


use App\Models\User;
use League\Fractal\TransformerAbstract;

class ProfileTransformer extends TransformerAbstract
{
    /**
     * @param User $user
     *
     * @return array
     */
    public function transform(User $user)
    {
        return [
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
