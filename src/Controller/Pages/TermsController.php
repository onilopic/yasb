<?php

declare(strict_types=1);

namespace App\Controller\Pages;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class TermsController extends AbstractController
{
    #[Route(path: '/terms-of-use', name: 'terms_of_use',
        options: [
            'breadcrumb' => [
                'label' => 'footer.link.term_of_use',
                'parent_route' => 'homepage'
            ]
        ],
    )]
    public function index(): Response
    {
        return $this->render('pages/terms.html.twig', []);
    }
}