<?php

declare(strict_types=1);

namespace App\Controller\Pages;

use App\Repository\PagesRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class TermsController extends AbstractController
{
    public function __construct(private readonly PagesRepository $repository)
    {
    }

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
        $pages = $this->repository->findBy(['slug' => 'terms-of-use']);
        if (count($pages) < 0) {
            throw new \RuntimeException('Privacy policy page not found by slug "privacy-policy"');
        }
        $page = $pages[0];


        return $this->render('pages/terms.html.twig', ['page' => $page]);
    }
}