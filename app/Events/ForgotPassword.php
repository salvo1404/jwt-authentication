<?php

namespace App\Events;

use App\Models\User;
use Illuminate\Queue\SerializesModels;

class ForgotPassword extends Event
{
    use SerializesModels;

    public $user;
    public $password;

    /**
     * @param User $user
     * @param      $password
     */
    public function __construct(User $user, $password)
    {
        $this->user     = $user;
        $this->password = $password;
    }

    /**
     * Get the channels the event should be broadcast on.
     *
     * @return array
     */
    public function broadcastOn()
    {
        return [];
    }
}
