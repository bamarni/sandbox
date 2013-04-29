<?php

namespace Acme\CacheBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Cache;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    /**
     * @Route("/")
     * @Template()
     */
    public function indexAction(Request $request)
    {
        $response = new Response;
        $response->setPublic();
        $response->setEtag('touti');

        if ($response->isNotModified($request)) {
            return $response;
        }

        return $this->render('AcmeCacheBundle:Default:index.html.twig', array(), $response);
    }

    public function shakeAction()
    {
        return new Response(str_shuffle('Shake me up.'));
    }
}
