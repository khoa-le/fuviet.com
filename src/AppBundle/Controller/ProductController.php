<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Product;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class ProductController extends Controller
{
    /**
     * @Route("/product/create")
     * @Template()
     */
    public function createAction()
    {
        $product = new Product();
        $product ->setName("Product 1");
        $product ->setDescription("Description product 1");
        $product->setPrice(100000);
        $product->setComparePrice(200000);

        $em = $this->getDoctrine()->getManager();
        $em->persist($product);
        $em->flush();

        return array(// ...
        );
    }


    /**
     * @Route("/product/show/{id}")
     * @Template()
     */
    public function showAction($id){

        $product = $this->getDoctrine()->getRepository("AppBundle:Product")->find($id);
        if(!$product){
            throw $this->createNotFoundException("No product found for id ".$id);
        }
        return array(
            "product"=>$product
        );
    }


}
