<?php

namespace App\Controller;

use App\Entity\Track;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TrackController extends AbstractController
{
    #[Route('/tracks', name: 'app_track')]
    public function index(ManagerRegistry $doctrine): Response
    {
        return $this->render('track/index.html.twig', [
            'tracks' => $doctrine->getRepository(Track::class)->findAll(),
        ]);
    }

    // realmente lo voy a necesitar??
    public function create(): Response
    {
        dd("Create");
    }

    public function store(): Response
    {
        dd("Store");
    }

    //realmente lo voy a necesitar??
    public function edit(): Response
    {
        dd("edit");
    }

    public function update(): Response
    {
        dd("update");
    }

    public function delete(): Response
    {
        dd("delete");
    }




}
