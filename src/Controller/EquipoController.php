<?php 
namespace App\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use App\Entity\Equipo;
use App\Form\EquipoType;


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
    public function nuevoEquipo(Request $request){
        $equipo= new Equipo();
        $form = $this->createForm(EquipoType::class, $equipo);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // $form->getData() holds the submitted values
            $equipo = $form->getData();
    
             $entityManager = $this->getDoctrine()->getManager();
             $entityManager->persist($equipo);
             $entityManager->flush();
    
            return $this->redirectToRoute('listaEquipo');
        }

        return $this->render('Equipo/nuevo.html.twig',[
            'form' => $form->createView()
        ]);
    }


}