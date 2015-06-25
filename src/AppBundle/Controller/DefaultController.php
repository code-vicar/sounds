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
    	$nasa_api_key = $this->getParameter('nasa_api_key');
    	$soundcloud_client_id = $this->getParameter('soundcloud_client_id');
    	$browser = $this->get('buzz');

    	$q = $request->query->get('query');

    	$req = 'https://api.nasa.gov/planetary/sounds?api_key='.$nasa_api_key;

    	if (!empty($q)) {
    		$req = $req.'&q='.$q;
    	}

    	$soundsReq = $browser->get($req);

    	$data = json_decode($soundsReq->getContent(), true);
    	$data['soundcloud_client_id'] = $soundcloud_client_id;
    	$data['query'] = $q;

		return $data;
    }
}
