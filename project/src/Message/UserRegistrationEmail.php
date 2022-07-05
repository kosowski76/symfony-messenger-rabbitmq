<?php

# project/src/Message/UserRegistationEmail.php
 
namespace App\Message;
 
class UserRegistrationEmail
{
    /**
     * @var int
     */
    private $userId;
 
    /**
     * UserRegistrationEmail constructor.
     *
     * @param int $userId
     */
    public function __construct(int $userId)
    {
        $this->userId = $userId;
    }
 
    /**
     * @return int
     */
    public function getUserId(): int
    {
        return $this->userId;
    }

/*    public function getSeconds()
    {
        return $this->seconds;
    }

    public function getOutput()
    {
        return $this->output;
    } */
}
