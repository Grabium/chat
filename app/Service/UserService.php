<?php
namespace App\Service;

use App\Models\User;
use Illuminate\Database\Eloquent\Collection;

class UserService
{
    public function getOtherUsers(User $currentUser): Collection
    {
        return User::where('id', '!=', $currentUser->id)->get();//talvez refatorar mandando para o Model.
    }
}