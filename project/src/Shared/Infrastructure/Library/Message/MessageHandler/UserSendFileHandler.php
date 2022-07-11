<?php

namespace App\Shared\Infrastructure\Library\Message\MessageHandler;


use App\Shared\Infrastructure\Library\Message\UserSendFile;
use Psr\Log\LoggerInterface;
use Symfony\Component\Messenger\Handler\MessageHandlerInterface;

class UserSendFileHandler implements MessageHandlerInterface
{
    private LoggerInterface $logger;

    /**
     * UserRegistrationEmailHandler.php constructor.
     *
     * @param LoggerInterface $logger
     */
    public function __construct(LoggerInterface $logger)
    {
        $this->logger = $logger;
    }

    /**
     * @param UserSendFile $orderConfirmationFile
     */
    public function __invoke(UserSendFile $orderConfirmationFile)
    {
        // Get user data from database for example
        // $user = $this->userRepository->find($orderConfirmationFile->getUserId());

        //
        sleep(1);

        // ... other stuff which can take a while ...

        $this->logger->info('Send file message was sent to userId: #' . $orderConfirmationFile->getUserId());
    }
}