<?php

declare(strict_types=1);

namespace Rector\Website\Blog\Controller;

use Rector\Website\Blog\Repository\PostRepository;
use Rector\Website\ValueObject\RouteName;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

final class BlogController extends AbstractController
{
    public function __construct(private PostRepository $postRepository)
    {
    }

    #[Route(path: 'blog', name: RouteName::BLOG)]
    public function __invoke(): Response
    {
        return $this->render('blog/blog.twig', [
            'posts' => $this->postRepository->getPosts(),
        ]);
    }
}
