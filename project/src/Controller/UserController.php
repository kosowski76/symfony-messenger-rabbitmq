<?php
 
namespace App\Controller;

use App\Form\SendFileFormType;
use App\Message\UserSendComment;
use App\Message\UserRegistrationEmail;
use App\Message\UserSendFile;
use Symfony\Component\HttpFoundation\File\File;
// use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Messenger\MessageBusInterface;
use Symfony\Component\Routing\Annotation\Route;
use Twig\Environment;
 
class UserController extends AbstractController
{
    private $twig;
    //private File $fileData;
    private FormInterface $form;

    public function __construct(Environment $twig)
    {
        $this->twig = $twig;
    }

    /**
     * @Route("/user/send-file", name="user_send_file")
     *
     * @return Response
     */
    public function userSendFile(Request $request, MessageBusInterface $bus): Response
    {
        // $user_id is got from authorization for example
        $user_id = 2;

        $form = $this->createForm(SendFileFormType::class);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {


            $bus->dispatch(new UserSendFile($user_id, $request));
            // $bus->dispatch(new UserRegistrationEmail($user_id));

            // return new Response('User has been sent file.');
        }

        return new Response($this->twig->render('user/send-file.html.twig', [
            'send_file_form' => $form->createView(),
        ]));
    }


    /**
     * @Route("/user/send-comment", name="user_send_comment")
     *
     * @return Response
     */
    public function userSendComment(Request $request, MessageBusInterface $bus): Response
    {
        // $user_id is got from authorization for example
        $user_id = 2;

        $form = $this->createForm(SendFileFormType::class);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $context = [
                'user_ip' => $request->getClientIp(),
                'user_agent' => $request->headers->get('user-agent'),
                'referrer' => $request->headers->get('referer'),
                'permalink' => $request->getUri(),
            ];

            $bus->dispatch(new UserSendComment($user_id, $context));
            // $bus->dispatch(new UserRegistrationEmail($user_id));

            return new Response('Comment has been sent. ' . $context['permalink']);
        }

        return new Response($this->twig->render('user/send-file.html.twig', [
            'send_file_form' => $form->createView(),
        ]));
    }

    /**
     * @Route("/user/register", name="user_register")
     *
     * @param MessageBusInterface $bus
     * @return Response
     */
    public function register(MessageBusInterface $bus): Response
    {

        // Handle registration form
 
        $bus->dispatch(new UserRegistrationEmail(2));
 
        // ... do some additional stuff ...
 
        return new Response('User has been registered.');
    }
}
