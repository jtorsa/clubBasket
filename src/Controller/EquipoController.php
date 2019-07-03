<?php 
namespace App\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Entity\Equipo;


/**
 * @Route("/equipo")
 * */
class EquipoController extends AbstractController{


    /**
     * @ROute("/lista", name="listaEquipo")
     */
    public function listaEquipo(){
        $repository =$this->getDoctrine()->getRepository(Equipo::class);
        $equipos = $repository->findAll();
        return $this->render('Equipo/lista.html.twig',['equipos'=>$equipos]);
    }

    /**
     * @ROute("/nuevo", name="nuevoEquipo")
     */
    public function nuevoEquipo(){
        $hola="Es es el home";

        return $this->render('Equipo/base.html.twig',['hola'=>$hola]);
    }
}