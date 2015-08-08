<?php

namespace App\Repositories;

interface ActivationRepositoryInterface
{
    public function getByToken($token);
    public function getByEmail($email);
    public function store($email);
    public function setUsed($email);
    public function deleteByEmail($email);
    public function destroy($id);
}
