<?php
/**
 * Created by PhpStorm.
 * User: davidlee
 * Date: 03/11/2017
 * Time: 14:19
 */

namespace AppBundle\Controller;

use AppBundle\Entity\Exchange;
use AppBundle\Entity\Instrument;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Service\StockService;


/**
 * Class StockFinderController
 * @package AppBundle\Controller
 */
class StockFinderController extends Controller
{

    public function getExchangeRepo()
    {
        return $this->getDoctrine()->getRepository(Exchange::class);
    }

    public function getInstrumentsRepo()
    {
        return $this->getDoctrine()->getRepository(Instrument::class);
    }

    /**
     * @param Request $request
     * @param StockService $stockService
     * @Route("/find_stocks", name="stock_finder")
     */
    public function exchangePickingController(Request $request, StockService $stockService)
    {
        $exchangesRepo = $this->getExchangeRepo();
        $exchanges = $exchangesRepo->findAll();

        return $this->render('StockFinder/StockFinderOptions.html.twig', array(
            'exchanges' => $exchanges
        ));
    }

    /**
     * @param Request $request
     * @param StockService $stockService
     * @Route("/analyze_exchanges", name="stock_analyser")
     * @return StockFinderResults.html.twig
     *
     * Action defines what action is to be perfomed.
     *
     * 1 = single exchange analysis,
     * 2 = analyze all exchanges
     *
     */
    public function stockAnalyzerController(Request $request, StockService $stockService){
        // get the action that is to be perfomed
        $action = $request->get('action');
        $exchange = $request->get('exchange');

        $exchangeRepo = $this->getExchangeRepo();
        $exchange = $exchangeRepo->find($exchange);

        $instrumentRepo = $this->getInstrumentsRepo();


        if($action == 1){
            $results = $stockService->analyzeAllExchanges();
        } elseif ($action == 2) {
            $instruments = $instrumentRepo->findBy(
                array(
                    'exchangeId' => $exchange,
                )
            );
            $results = $stockService->analyzeExchange($exchange);
        } elseif ($action == 3){
            $instruments = $instrumentRepo->findBy(
                array(
                    'exchangeId' => $exchange,
                    'trading212' => 1
                )
            );
            $results = $stockService->analyzeExchange($exchange, $instruments);
        }


        return $this->render('StockFinder/StockFinderResults.html.twig', array(
            'oppertunities' => $results[0],
            'downs' => $results[1],
            'errors' => $results[2]
        ));

    }


}