<?php

namespace App\Controller\Pages;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class PrivacyController extends AbstractController
{
    #[Route('/privacy', name: 'privacy')]
    public function index(): Response
    {
        return $this->render('pages/privacy.html.twig', []);
    }
}