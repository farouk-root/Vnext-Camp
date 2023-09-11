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
    public function addCampJSON(Request $request, SerializerInterface $serializer, EntityManagerInterface $entityManager)
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
        return new JsonResponse($responseData, 200, [], true);
    }

    #[Route('api/camp/', name: 'app_camp_getAll')]
    public function  getAllCampsJSON(EntityManagerInterface $entityManager, SerializerInterface $serializer)
    {
        $repository = $entityManager->getRepository(Camp::class);
        $entities = $repository->findAll();
        $jsonContent = $serializer->serialize($entities, 'json');

        return new JsonResponse($jsonContent, 200, [], true);
    }
    #[Route('api/camp/{id}', name: 'app_camp_getById')]
    public function  getCampByIdJSON(EntityManagerInterface $entityManager, SerializerInterface $serializer,$id)
    {
        $repository = $entityManager->getRepository(Camp::class);
        $entity = $repository->find($id);
        if (!$entity) {
            return new JsonResponse(['message' => 'Entity not found'], 404);
        }
        $jsonContent = $serializer->serialize($entity, 'json');

        return new JsonResponse($jsonContent, 200, [], true);
    }
    #[Route('api/camp/delete/{id}', name: 'app_camp_deleteCampByI', methods: ['DELETE'])]
    public function  deleteCampByIdJSON(EntityManagerInterface $entityManager, SerializerInterface $serializer,$id)
    {
        $repository = $entityManager->getRepository(Camp::class);
        $entity = $repository->find($id);
        if (!$entity) {
            return new JsonResponse(['message' => 'Entity not found'], 404);
        }
        $entityManager->remove($entity);
        $entityManager->flush();

        return new JsonResponse(['message' => 'Entity deleted successfully'], 200);
    }




}
