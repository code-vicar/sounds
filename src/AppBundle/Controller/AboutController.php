<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class AboutController extends Controller
{
	private $about = 'Nasa sounds api';

    /**
     * @Route("/about", name="about")
     */
    public function aboutAction()
    {
        return new Response(
            "<html><body>Symfony demo using the {$this->about}</body></html>"
        );
    }
}
