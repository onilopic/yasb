<?php

namespace App\Controller\Pages;

use App\Repository\PagesRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class PrivacyController extends AbstractController
{
    public function __construct(private readonly PagesRepository $repository)
    {
    }

    #[Route('/privacy', name: 'privacy')]
    public function index(): Response
    {
        $pages = $this->repository->findBy(['slug' => 'privacy-policy']);
        if (count($pages) < 0) {
            throw new \RuntimeException('Privacy policy page not found by slug "privacy-policy"');
        }
        $page = $pages[0];


        return $this->render('pages/privacy.html.twig', [
            'page' => $page
        ]);
    }
}