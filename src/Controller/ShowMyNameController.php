<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ShowMyNameController extends AbstractController
{
    #[Route('/show/my/name', name: 'show_my_name')]
    public function homepage(): Response
    {
        return $this->render('show_my_name/index.html.twig', [
            'controller_name' => 'ShowMyNameController',
        ]);
    }
}
