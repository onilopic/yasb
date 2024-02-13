<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace App\Controller\Admin;

use App\Entity\Pages;
use App\Entity\User;
use App\Form\PagesType;
use App\Repository\PagesRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;

#[Route('/admin/pages')]
#[IsGranted(User::ROLE_ADMIN)]
class PagesController extends AbstractController
{
    #[Route('/', name: 'app_pages_index', methods: ['GET'])]
    public function index(PagesRepository $pagesRepository): Response
    {
        return $this->render('admin/pages/index.html.twig', [
            'pages' => $pagesRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_pages_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $page = new Pages();
        $created = new \DateTimeImmutable();
        $page->setCreatedAt($created);
        $page->setUpdatedAt($created);

        $form = $this->createForm(PagesType::class, $page)
            ->add('saveAndCreateNew', SubmitType::class);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($page);
            $entityManager->flush();

            return $this->redirectToRoute('app_pages_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('admin/pages/new.html.twig', [
            'page' => $page,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_pages_show', methods: ['GET'])]
    public function show(Pages $page): Response
    {
        return $this->render('admin/pages/show.html.twig', [
            'page' => $page,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_pages_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Pages $page, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(PagesType::class, $page);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_pages_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('admin/pages/edit.html.twig', [
            'page' => $page,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_pages_delete', methods: ['POST'])]
    public function delete(Request $request, Pages $page, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$page->getId(), $request->request->get('_token'))) {
            $entityManager->remove($page);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_pages_index', [], Response::HTTP_SEE_OTHER);
    }
}
