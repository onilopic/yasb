<?php

namespace App\Controller;

use App\Repository\PostRepository;
use App\Repository\TagRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Attribute\Cache;

class HomeController extends AbstractController
{
    #[Cache(smaxage: 10)]
    public function index(PostRepository $posts, TagRepository $tags, string $_format = 'html', int $page = 0): Response
    {
        $latestPosts = $posts->findLatest($page);

        $popularTags = $tags->findPopular(3);

        // Every template name also has two extensions that specify the format and
        // engine for that template.
        // See https://symfony.com/doc/current/templates.html#template-naming
        return $this->render(
            'default/homepage.'.$_format.'.twig', [
                'paginator' => $latestPosts,
                'popular_tags' => $popularTags
            ]
        );
    }

}