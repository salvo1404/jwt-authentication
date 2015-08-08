<?php

namespace App\Repositories;

interface UserRepositoryInterface
{
    public function getPaginated($limit);
    public function findById($id);
    public function findByEmail($email);
    public function resetPassword($id, $password);
    public function store($data);
    public function update($user, $data);
    public function destroy($id);
}
