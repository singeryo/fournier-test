<?php

namespace App\Controller\Api;

use App\Repository\ServiceRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\Normalizer\AbstractNormalizer;

class ServiceController extends AbstractController
{
    /**
     * @Route("/api/services", name="app_api_service")
     */
    public function index(ServiceRepository $serviceRepository): JsonResponse
    {
        $defaultContext = [
            AbstractNormalizer::CIRCULAR_REFERENCE_HANDLER => function ($object) {
                return $object->getName();
            },
        ];

        return $this->json($serviceRepository->findAll(), 200, [], $defaultContext);
    }
}
