<?php
# project/src/Shared/Infrastructure/Library/Message/UserSendFile.php

namespace App\Shared\Infrastructure\Library\Message;

use Symfony\Component\Form\FormInterface;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\HttpFoundation\Request;

class UserSendFile
{
    private int $userId;
    private array $context;

    /**
     * UserRegistrationEmail constructor.
     *
     * @param int $userId
     * @param array $context
     */
    public function __construct(int $userId, array $context)
    {
        $this->userId = $userId;
        $this->context = $context;
    }

    /**
     * @return int
     */
    public function getUserId(): int
    {
        return $this->userId;
    }

    /**
     * @return array
     */
    public function getContext(): array
    {
        return $this->context;
    }
}