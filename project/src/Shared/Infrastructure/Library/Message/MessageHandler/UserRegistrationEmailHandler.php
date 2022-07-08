<?php
 
namespace App\Message\MessageHandler;
 
use App\Message\UserRegistrationEmail;
use Psr\Log\LoggerInterface;
use Symfony\Component\Messenger\Handler\MessageHandlerInterface;
 
class UserRegistrationEmailHandler implements MessageHandlerInterface
{
    /**
     * @var LoggerInterface
     */
    private $logger;
 
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
     * @param UserRegistrationEmail $orderConfirmationEmail
     */
    public function __invoke(UserRegistrationEmail $orderConfirmationEmail)
    {
        // Get user data from database
        // Create an email from template
 
        // Send email
        sleep(5);
 
        // ... other stuff which can take a while ...
 
        $this->logger->info('Registration message was sent to user ' . $orderConfirmationEmail->getUserId());
    }
}
