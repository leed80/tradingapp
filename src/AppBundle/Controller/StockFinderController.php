<?php
/**
 * Created by PhpStorm.
 * User: davidlee
 * Date: 03/11/2017
 * Time: 14:19
 */

namespace AppBundle\Controller;

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

    /**
     * @param Request $request
     * @param StockService $stockService
     * @Route("/find_stocks", name="stock_finder")
     */
    public function exchangePickingController(Request $request, StockService $stockService)
    {
        $exchanges = $stockService->getStockExchangeList();


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

        if($action == 1){
            $results = $stockService->analyzeAllExchanges();
        } elseif ($action == 2) {
            $results = $stockService->analyzeExchange($exchange);
        } elseif ($action == 3){
            $results = $stockService->analyzeExchange($exchange, 1)  ;      }


        return $this->render('StockFinder/StockFinderResults.html.twig', array(
            'oppertunities' => $results[0],
            'downs' => $results[1],
            'errors' => $results[2]
        ));

    }


}