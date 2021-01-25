<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;
use Symfony\Component\Routing\Annotation\Route;

class EmailController extends AbstractController
{
    #[Route('/email', name: 'email')]
    public function index(MailerInterface $mailer): Response
    {
        $email = (new Email())
            ->from('contact@ruakh.com')
            ->to('customer@example.com')
            ->subject('Mailing test')
            ->text('This is a mail test. :)');

        $mailer->send($email);

        return $this->render('email/index.html.twig', [
            'controller_name' => 'EmailController',
        ]);
    }
}
