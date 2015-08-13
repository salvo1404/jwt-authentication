<?php

namespace App\Repositories;


use App\Exceptions\EntitySavingException;
use App\Models\User;
use Hash;

class UserRepository implements UserRepositoryInterface
{
    /**
     * @param $limit
     *
     * @return mixed
     */
    public function getPaginated($limit)
    {
        return User::paginate($limit);
    }

    /**
     * @param $id
     *
     * @return mixed
     */
    public function find($id)
    {
        return User::find($id);
    }

    /**
     * @param $email
     *
     * @return mixed
     */
    public function findByEmail($email)
    {
        return User::where('email', $email)->first();
    }

    /**
     * @param $data
     *
     * @return User
     * @throws EntitySavingException
     */
    public function store($data)
    {
        $user             = new User;
        $user->first_name = $data['first_name'];
        $user->last_name  = $data['last_name'];
        $user->email      = $data['email'];
        $user->password   = Hash::make($data['password']);

        if(! $user->save()){
            throw new EntitySavingException;
        }

        return $user;
    }

    /**
     * @param $user
     * @param $data
     *
     * @return User
     *
     */
    public function update($user, $data)
    {
        if (!empty($data['first_name'])) {
            $user->first_name = $data['first_name'];
        }
        if (!empty($data['last_name'])) {
            $user->last_name = $data['last_name'];
        }
        if (!empty($data['email'])) {
            $user->email = $data['email'];
        }
        if (!empty($data['password'])) {
            $user->password = Hash::make($data['password']);
        }
        if (!empty($data['employer'])) {
            $user->employer = $data['employer'];
        }
        if (!empty($data['state'])) {
            $user->state = $data['state'];
        }

        return $user->save();
    }

    /**
     * @param User $user
     * @param      $password
     *
     * @return mixed
     */
    public function resetPassword(User $user, $password)
    {
        $user->password = Hash::make($password);

        return $user->save();
    }

    /**
     * @param $id
     *
     * @return int
     */
    public function destroy($id)
    {
        return User::destroy($id);
    }

}
