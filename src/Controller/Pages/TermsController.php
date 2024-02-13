<?php

namespace App\Controller\Pages;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Routing\RouterInterface;
use WhiteOctober\BreadcrumbsBundle\Model\Breadcrumbs;

final class TermsController extends AbstractController
{
    #[Route(path:'/terms-of-use', name:'terms-of-use',
        options: [
            'breadcrumb' => [
                'label' => 'Terms of use',
                'parent_route' => 'homepage'
            ]
        ],
    )]
    public function index(Breadcrumbs $breadcrumbs, RouterInterface $router): Response
    {
        // Simple example
        $breadcrumbs->addItem("Home", $router->generate("homepage"));
        // Example without URL
        $breadcrumbs->addItem("Terms of use");

        return $this->render('pages/terms.html.twig', []);
    }
}