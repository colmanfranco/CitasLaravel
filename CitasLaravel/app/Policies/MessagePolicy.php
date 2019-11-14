<?php

namespace App\Policies;

use App\Enums\UserType;
use App\Message;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class MessagePolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user)
    {
        //
    }

    public function view(User $user, Message $message)
    {
        return $message->all() == null;
    }

    public function create(User $user)
    {
        //
    }

    public function update(User $user, Message $message)
    {
        return $user->role == UserType::Administrator or $user->id == $message->user_id;
    }

    public function delete(User $user, Message $message)
    {
        return $user->role == UserType::Administrator or $user->id == $message->user_id;
    }

    public function deleteAll(User $user, Message $message)
    {
        return $user->role == UserType::Administrator;
    }

    public function restore(User $user, Message $message)
    {
        //
    }

    public function forceDelete(User $user, Message $message)
    {
        //
    }
}
