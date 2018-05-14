<?php
/**
 * Created by PhpStorm.
 * User: davidlee
 * Date: 12/01/2018
 * Time: 14:52
 */

namespace AppBundle\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use AppBundle\Entity\MarketPositions;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;


class PortfolioController extends controller
{
    /**
     * @Route("/", name="portfolio")
     *
     * Show the web page
     */
    public function indexAction(Request $request)
    {

        $repository = $this->getDoctrine()->getRepository(MarketPositions::class);

        $openMarketPositions = $repository->findBy(
            array('close_date' => '')

        );



        // replace this example code with whatever you need
        return $this->render('Portfolio/index.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.project_dir')).DIRECTORY_SEPARATOR,
        ]);
    }
}