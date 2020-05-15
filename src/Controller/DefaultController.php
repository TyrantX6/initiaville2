<?php

namespace App\Controller;

use App\Entity\Project;
use App\Repository\CategoryRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends AbstractController
{
    /**
     * @Route("/", name="homepage")
     */
    public function index()
    {
        $em = $this->getDoctrine();

        $projects = $em->getRepository(Project::class)->findBy(
            [],
            ['createdAt' => 'DESC'], // le deuxième paramètre permet de définir l'ordre
            3,// le troisième la limite
            0
        );

        return $this->render("default/index.html.twig", [
            "projects" => $projects
    ]);
    }

    public function catMenu(CategoryRepository $categoryRepository)
    {
        return $this->render('default/_menu.html.twig',[
            "categories" => $categoryRepository->findAll()
    ]);
    }



}
