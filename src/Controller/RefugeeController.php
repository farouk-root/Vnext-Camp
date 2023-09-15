<?php

namespace App\Controller;

use App\Entity\Refugee;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
#[Route('/refugee')]
class RefugeeController extends AbstractController
{
    #[Route('/', name: 'app_refugee_getAll')]
    public function refugeeGetAll(EntityManagerInterface $entityManager): Response
    {
        $refugees = $entityManager->getRepository(Refugee::class)->findAll();
        return $this->render('refugee/index.html.twig', [
            'Refugees' => $refugees,
        ]);
    }
}
