<?php

namespace App\Controller;

use App\Entity\Camp;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\SerializerInterface;

class CampController extends AbstractController
{
    #[Route('api/camp/add', name: 'app_camp_add')]
    public function addCamp(Request $request, SerializerInterface $serializer, EntityManagerInterface $entityManager)
    {
        $jsonContent = $request->getContent();
            try {
                $entities = $serializer->deserialize($jsonContent, Camp::class, 'json');
                if ($entities)
                {
                    $normalizedData = $serializer->normalize($entities);
                    $responseData = ['message' => 'Data imported successfully', 'data' => $normalizedData];

                }
                else
                    $responseData = ['message' => 'Data is empty'];

            } catch (\Exception $e) {
                $responseData = ['message' => 'Failed to import data', 'error' => $e->getMessage()];
            }
        $entityManager->persist($entities);
        $entityManager->flush();
        return new JsonResponse($responseData);
    }


    /*public function index(): Response
    {
        return $this->render('camp/index.html.twig', [
            'controller_name' => 'CampController',
        ]);
    }*/
}
