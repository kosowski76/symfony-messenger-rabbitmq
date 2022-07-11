<?php
 
namespace App\Controller;

use App\Form\SendFileFormType;
use App\Shared\Infrastructure\Library\Message\UserSendFile;
use App\Shared\Infrastructure\Library\Service\FileUploader;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
// use Symfony\Component\Form\FormInterface;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Messenger\MessageBusInterface;
use Symfony\Component\Routing\Annotation\Route;
use Twig\Environment;
 
class UserController extends AbstractController
{
    private $twig;
    // private FormInterface $form;
    private $bus;

    public function __construct(Environment $twig, MessageBusInterface $bus)
    {
        $this->twig = $twig;
        $this->bus = $bus;
    }

    /**
     * @Route("/user/send-file", name="user_send_file")
     *
     * @return Response
     */
    public function userSendFileForm(Request $request, FileUploader $fileUploader): Response
    {
        // $user_id is got from authorization for example
        $user_id = 2;

        $form = $this->createForm(SendFileFormType::class);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid())
        {
            /** @var  UploadedFile $uploadedFile */
            $uploadedFile = $form->get('photo')->getData();
            if ($uploadedFile)
            {
                $uploadedFileName = $fileUploader->upload($uploadedFile);
            }

            $context = [
                'user_ip' => $request->getClientIp(),
                'referrer' => $request->headers->get('referer'),
                'permalink' => $request->getUri(),
                'fileName' => $uploadedFileName,
            ];

            $this->bus->dispatch(new UserSendFile($user_id, $context));

            return new Response('User has been sent file.');
        }

        return new Response($this->twig->render('user/send-file.html.twig', [
            'send_file_form' => $form->createView(),
        ]));
    }

}
