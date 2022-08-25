<?php

namespace App\Controller;

use App\Entity\Companies;
use phpDocumentor\Reflection\DocBlock\Tags\Var_;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DashboardController extends AbstractController
{
    /**
     * @Route("/", name="dashboard")
     */
    public function dashboard(): Response
    {    
        $companies = $this->getDoctrine()->getRepository(Companies::class)->countPDACompanies();

        $total = 0;

        for($i = 0; $i < count($companies); $i++){
            $total = $total + $companies[$i]["nb"];
        }

        for($i = 0; $i < count($companies); $i++){
            $companies[$i]["percent"] = round((( $companies[$i]["nb"]*100)/$total), 2);
        }
        return $this->render('dashboard.html.twig', ['companies' => $companies]);
    }
}

?>