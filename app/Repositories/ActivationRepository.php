<?php

namespace App\Repositories;


use Carbon\Carbon;
use DB;

class ActivationRepository implements ActivationRepositoryInterface
{
    /**
     * @param $token
     *
     * @return mixed
     */
    public function getByToken($token)
    {
        return DB::table('activations')
                 ->where('code', $token)
                 ->first();
    }

    /**
     * @param $email
     *
     * @return mixed|static
     */
    public function getByEmail($email)
    {
        return DB::table('activations')
                 ->where('email', $email)
                 ->first();
    }

    /**
     * @param $email
     *
     * @return string
     */
    public function store($email)
    {
        $digits = 4;
        $token = rand(pow(10, $digits-1), pow(10, $digits)-1);
        DB::table('activations')
          ->insert(
              [
                  'email'      => $email,
                  'code'      => $token,
                  'created_at' => Carbon::now()
              ]
          );

        return $token;
    }

    /**
     * @param $email
     *
     * @return int
     */
    public function setUsed($email)
    {
        return DB::table('activations')
                 ->where('email', $email)
                 ->update(['used' => 1]);
    }

    /**
     * @param $email
     *
     * @return int
     */
    public function deleteByEmail($email)
    {
        return DB::table('activations')->where('email', $email)->delete();
    }

    /**
     * @param $id
     *
     * @return int
     */
    public function destroy($id)
    {
        return DB::table('activations')->where('id', $id)->delete();
    }

}
