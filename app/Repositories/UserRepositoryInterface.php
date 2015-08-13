<?php

namespace App\Repositories;

use App\Models\User;

interface UserRepositoryInterface
{
    /**
     * @param $limit
     *
     * @return mixed
     */
    public function getPaginated($limit);

    /**
     * @param $id
     *
     * @return mixed
     */
    public function find($id);

    /**
     * @param $email
     *
     * @return mixed
     */
    public function findByEmail($email);

    /**
     * @param User $user
     * @param      $password
     *
     * @return mixed
     */
    public function resetPassword(User $user, $password);

    /**
     * @param $data
     *
     * @return mixed
     */
    public function store($data);

    /**
     * @param $user
     * @param $data
     *
     * @return mixed
     */
    public function update($user, $data);

    /**
     * @param $id
     *
     * @return mixed
     */
    public function destroy($id);
}
