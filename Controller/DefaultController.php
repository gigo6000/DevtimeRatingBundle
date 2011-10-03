<?php

namespace Devtime\RatingBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

use Devtime\RatingBundle\Entity\Review;

use Devtime\RatingBundle\Form\ReviewType;


class DefaultController extends Controller
{
    protected $ajax = false;
    protected $em;
    protected $owner;
    protected $request;
 
    public function init()
    {
        $this->request = $this->get('request');
        if($this->request->isXmlHttpRequest())
        {
            $this->ajax = true;
        }
        $this->em = $this->get('doctrine.orm.entity_manager');
      //  $this->user = $this->get('security.context')->getToken()->getUser();
      //  $this->owner = $this->user->getOwner();
    }

    /**
     * @Route("/rating")
     * @Template()
     */
    public function ratingAction()
    {
      $this->init();     

      $review = new Review();
      $form = $this->get('form.factory')->create(new ReviewType(), $review);

        if ($this->request->getMethod() == 'POST') {

              $form->bindRequest($this->request);

              if ($form->isValid()) {

                      $this->em->persist($review);
                      $this->em->flush();

                      $this->get('session')->setFlash('success', "Review saved!");


              }   
         } 

      return array('review' => $review, 'form'=> $form->createView());



    }
}
