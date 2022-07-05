<?php

# project/src/Message/UserSendFile.php

namespace App\Message;

use Symfony\Component\Form\FormInterface;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\HttpFoundation\Request;

//use Symfony\Component\HttpFoundation\File\UploadedFile;

class UserSendFile
{
    private int $userId;
    private Request $file;

    /**
     * UserRegistrationEmail constructor.
     *
     * @param int $userId
     * @param array $context
     */
    public function __construct(int $userId, array $context)
    {
        $this->userId = $userId;
        $this->file = $context;
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
    public function getUploadedFile(): array
    {
        return $this->file;
    }
}