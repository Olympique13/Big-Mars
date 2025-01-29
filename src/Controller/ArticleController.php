<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class ArticleController extends AbstractController
{
    #[Route('/blog', name: 'app_article')]
    public function index(): Response
    {
        return $this->render('article/index.html.twig');
    }


    #[Route('/blog/{slug}', name: 'show_article')]
    public function showBlog(): Response
    {
        return $this->render('article/show.html.twig');
    }
}
