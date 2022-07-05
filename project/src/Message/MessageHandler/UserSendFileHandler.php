<?php

namespace App\Message\MessageHandler;


use App\Message\UserSendFile;
use Psr\Log\LoggerInterface;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Symfony\Component\Messenger\Handler\MessageHandlerInterface;

class UserSendFileHandler implements MessageHandlerInterface
{
    private LoggerInterface $logger;
    private string $uploadDir;

    /**
     * UserRegistrationEmailHandler.php constructor.
     *
     * @param LoggerInterface $logger
     */
    public function __construct(LoggerInterface $logger, string $uploadDir)
    {
        $this->logger = $logger;
        $this->uploadDir = $uploadDir;
    }

    /**
     * @param UserSendFile $orderConfirmationFile
     */
    public function __invoke(UserSendFile $orderConfirmationFile)
    {
        // Get user data from database for example
        // Create an email from template for example

        // $fileData = $orderConfirmationFile->getUploadedFile();
        // $filename = bin2hex(random_bytes(6)) . '.' . $fileData->guessExtension();
/*
        try {
            $fileData->move($this->uploadDir, $filename);
        } catch (FileException $e) {
            // unable to upload the file, give up
        } */

        // Send file
        sleep(1);

        // ... other stuff which can take a while ...

        $this->logger->info('Send file message was sent to user ' . $orderConfirmationFile->getUserId() . ' with file name:' . $orderConfirmationFile->getUploadedFile());
    }
}