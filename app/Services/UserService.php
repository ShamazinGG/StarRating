<?php

namespace App\Services;

use App\Exceptions\UserNotFoundException;
use App\Models\User;



class UserService
{
    public function findById($id)
    {
        $user = User::where('id', $id)->first();
        if(!$user) {
            throw new UserNotFoundException('Пользователь c id' . $id . 'не найден');
        }

        return $user;
    }

}
