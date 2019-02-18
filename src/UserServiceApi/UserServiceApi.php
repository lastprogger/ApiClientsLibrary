<?php
namespace InternalApi\UserServiceApi;

use InternalApi\ServiceApi;
use InternalApi\UserServiceApi\Models\User;

class UserServiceApi extends ServiceApi
{
    private static $currentUser;
    /**
     * @return Resources\User
     */
    public function user(): Resources\User
    {
        return new Resources\User($this->getHttpClient());
    }

    /**
     * return current authorized user
     *
     * @return User|null
     */
    public static function getCurrentUser(): ?User
    {
        return self::$currentUser;
    }

    /**
     * @param User $currentUser
     */
    public static function setCurrentUser(User $currentUser): void
    {
        self::$currentUser = $currentUser;
    }
}