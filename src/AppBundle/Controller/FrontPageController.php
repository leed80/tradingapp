<?php

namespace AppBundle\Controller;

//use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class FrontPageController extends Controller
{
    /**
     * @Route("/", name="homepage")
     *
     * Show the web page
     */
    public function indexAction(Request $request)
    {
        $data = array(
            'base_dir' => realpath($this->getParameter('kernel.project_dir')).DIRECTORY_SEPARATOR,
            'page_title' => 'Homepage',
        );

        // replace this example code with whatever you need
        return $this->render('default/index.html.twig', $data);
    }




}
