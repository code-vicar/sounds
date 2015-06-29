<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{

    /**
     * @Route("/", name="homepage")
     * @Template
     */
    public function indexAction(Request $request)
    {
    	$nasaApi = $this->get('sounds.nasa_api');

    	$q = $request->query->get('query');

    	$soundsReq = $nasaApi->getSounds(array('query' => $q));

    	$data = json_decode($soundsReq->getContent(), true);
    	$data['soundcloud_client_id'] = $nasaApi->soundcloud_client_id;
    	$data['query'] = $q;

		return $data;
    }
}
