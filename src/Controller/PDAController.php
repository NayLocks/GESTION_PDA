<?php

namespace App\Controller;

use App\Entity\PDA;
use phpDocumentor\Reflection\DocBlock\Tags\Var_;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PDAController extends AbstractController
{
    /**
     * @Route("/pda", name="pda")
     */
    public function dashboard(): Response
    {   
        $listPDA = $this->getDoctrine()->getRepository(PDA::class)->findAll();

        return $this->render('PDA/pda.html.twig', ['listPDA' => $listPDA]);
    }
}

?>