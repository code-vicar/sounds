<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class AboutController extends Controller
{
	private $about = 'Nasa sounds api';

    /**
     * @Route("/about", name="about")
     * @Template
     */
    public function aboutAction()
    {
        return array('about'=>$this->about);
    }
}
