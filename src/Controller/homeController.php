<?php
namespace App\Controller;

use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;

class homeController extends Controller
{
    /**
     * @Route("/", name="home")
     * @param EntityManagerInterface $em
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function homeAction(EntityManagerInterface $em)
    {

        return $this->render('index.html.twig');
    }
}