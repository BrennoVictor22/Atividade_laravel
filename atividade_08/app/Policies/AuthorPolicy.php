<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Author;

class AuthorPolicy
{
    public function viewAny(User $user)
    {
        return true; 
    }

    public function view(User $user)
    {
        return true;
    }

    public function create(User $user)
    {
        return $user->role === 'admin';
    }

    public function update(User $user, Author $author)
    {
        return $user->role === 'admin' || $user->id === $author->user_id;
    }

    public function delete(User $user)
    {
        return $user->role === 'admin';
    }
}