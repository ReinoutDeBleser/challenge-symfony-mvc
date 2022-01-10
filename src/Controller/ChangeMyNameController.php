<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ChangeMyNameController extends AbstractController
{
    #[Route('/change/my/name', name: 'change_my_name')]
    public function index(): Response
    {
        return $this->render('change_my_name/index.html.twig', [
            'controller_name' => 'ChangeMyNameController',
        ]);
    }
}
