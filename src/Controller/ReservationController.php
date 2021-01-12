<?php

namespace App\Controller;

use App\Entity\User;
use App\Entity\Reservation;
use App\Form\ReservationType;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Security;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ReservationController extends AbstractController
{
    
    private $entityManager;
    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }


    /**
     * @Route("/reservation", name="reservation")
     */
    public function index(Request $request, EntityManagerInterface $entityManager): Response
    {

        $reservation = new Reservation();
        
        
        $form = $this->createForm(ReservationType::class, $reservation);
        $form->handleRequest($request);

        
        if ($form->isSubmitted() && $form->isValid()) {

            dd($form->getData());
            
            $reservation = $form->getData();

           
            
           

            $reservation->setDisponibilite = false;
         $this->entityManager->persist($reservation);
         $this->entityManager->flush();
        }


        

        return $this->render('reservation/index.html.twig', [

            "form" => $form -> createView(),
            "user" => $user = $this->getUser()
        
        ]);
       
        
    }
}
