<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class AboutController extends Controller
{

  /**
   * @Route("/about", name="about")
   * @Template
   */
  public function aboutAction()
  {
    $aboutSvc = $this->get('sounds.about_service');

    return array('about'=>$aboutSvc->message);
  }
}
