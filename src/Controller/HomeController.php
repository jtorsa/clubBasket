<?php 
namespace App\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;



class HomeController extends AbstractController{


    /**
     * @ROute("/",name="home")
     */
    public function homepage(){
        $hola="Es es el home";
        return $this->render('Home/base.html.twig',['hola'=>$hola]);
    }
}