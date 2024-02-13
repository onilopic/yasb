<?php

namespace App\Controller\Pages;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class TermsController extends AbstractController
{
    #[Route(path:'/terms-of-use', name:'terms-of-use')]
    public function index(): Response
    {
        return $this->render('pages/terms.html.twig', []);
    }
}