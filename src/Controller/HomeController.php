<?php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use App\Repository\JVRepository;
use App\Entity\JV;
use App\Repository\GenreRepository;
use App\Entity\Genre;

class HomeController extends AbstractController
{
    #[Route('/', name: 'app_index')]
    public function index(JVRepository $jvRepository): Response
    {
        $jeux = $jvRepository->findAll();
        return $this->render('default.html.twig', ['jeux' => $jeux]);
    }

    public function navGenre(GenreRepository $genreRepository): Response
    {
        $genres = $genreRepository->findAll();
        return $this->render('nav/genre.html.twig', ['genres' => $genres]);
    }

    #[Route('/cate/{slug}', name: 'app_genre_test')]
    public function genre( string $slug, GenreRepository $genreRepository): Response
    {
        $genre = $genreRepository->findOneBy(['slug' => $slug]);

        return $this->render('genre.html.twig', ['genre' => $genre]);
    }


    #[Route('/blog/{id}', name: 'app_jeu_show')]
    public function blog(JV $jeu): Response
    {
        return $this->render('single-blog.html.twig', ['jeu' => $jeu]);
    }
}