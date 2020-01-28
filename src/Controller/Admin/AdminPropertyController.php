<?php 

namespace App\Controller\Admin;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Repository\PropertyRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AdminPropertyController extends AbstractController {

     /**
     * @var PropertyRepository
     */
    private $repository;

    public function __construct(PropertyRepository $repository ) {
        $this->repository = $repository;
    }

    /**
     * @Route("/admin", name="admin.property.index")
     * @var Symfony\Component\HttpFoundation\Response;
    */
    public function index (){
        $properties = $this->repository->findAll();
        dump($properties);
        return $this->render('property/index.html.twig', ['properties' => $properties] );
    }


    /**
     * @route ("/admin/{id}", name="admin.property.edit")
     * @param PropertyRepository $property
     * @return Symfony\Component\HttpFoundation\Response
     */
    public function edit(PropertyRepository $property){
        return $this->render('property/edit.html.twig', ['property' => $property] );
    }
}
