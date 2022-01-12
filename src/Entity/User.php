<?php

namespace App\Entity;

class User
{
    //
    protected string $user;

    public function getUser(): string
    {
        return $this->user;
    }

    public function setUser(string $user): void
    {
        $this->user = $user;
    }
}