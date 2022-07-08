<?php

namespace App\Message\MessageHandler;

use App\Message\UserSendComment;
// use App\Repository\CommentRepository;
// use App\SpamChecker;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Messenger\Handler\MessageHandlerInterface;

class UserSendCommentHandler implements MessageHandlerInterface
{
    // private $spamChecker;
    private $entityManager;
    // private $commentRepository;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
        // $this->spamChecker = $spamChecker;
        // $this->commentRepository = $commentRepository;
    }

    public function __invoke(UserSendComment $message)
    {
        /*
        $comment = $this->commentRepository->find($message->getId());
        if (!$comment) {
            return;
        }

        if (2 === $this->spamChecker->getSpamScore($comment, $message->getContext())) {
            $comment->setState('spam');
        } else {
            $comment->setState('published');
        } */

        $this->entityManager->flush();

        echo 'Commentx was sent to user ' . $message->getId() ;
    }
}