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
     * @param Request $file
     */
    public function __construct(int $userId, Request $file)
    {
        $this->userId = $userId;
        $this->file = $file;
    }

    /**
     * @return int
     */
    public function getUserId(): int
    {
        return $this->userId;
    }

    /**
     * @return Request
     */
    public function getUploadedFile(): Request
    {
        return $this->file;
    }
}