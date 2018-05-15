<?php
/**
 * Created by PhpStorm.
 * User: davidlee
 * Date: 25/10/2017
 * Time: 14:39
 */

namespace AppBundle\Service;

use MarketDataService;
use TechnicalAnalysisService;
use AppBundle\Entity\Instrument;
use AppBundle\Entity\Exchange;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\DependencyInjection\ContainerInterface as Container;
use Symfony\Component\Console\Helper\ProgressBar;
use AppBundle\Service\QuandlService;

class StockService
{

    public function getInstrumentData($instrument, $exchangeCode)
    {
        $symbol = "$exchangeCode/$instrument";
        $quandl = new QuandlService($this->apiKey);
        $instrumentData = $quandl->getSymbol($symbol, [
            "colapse" => "weekly"
        ]);
        //$instrumentData = $this->MarketDataService->apiservice($instrument, $timeScale);

        if($instrumentData == "" || $instrumentData == null){
            $instrumentData = "error";
        }
        return $instrumentData;

    }

    public function analyzeExchange($exchangeObject, $instruments){

        $opportunities = array();
        $down = array();
        $error = array();

        foreach($instruments as $instrument){
            $instrumentSymbol = $instrument->getName();
            $instrumentName = $instrument->getInstrumentName();

            // append exchange symbol to the start of the instrument symbol for use with QuandlService
            $instrumentData = $this->getInstrumentData($instrumentSymbol, $exchangeObject->getCode());
            $result = $this->analyzeInstrumentData($instrumentData);

            if($result === "error"){
                array_push($error, "$instrumentName errored on alphavantage");
            } else {
                switch ($result) {
                    case 3:
                        array_push($opportunities, "$instrumentName ($instrumentSymbol) is in a Strong weekly trend");
                        break;
                    case 2:
                        array_push($opportunities, "$instrumentName ($instrumentSymbol) is in a trend weekly");
                        break;
                    case 1:
                        array_push($opportunities, "$instrumentName ($instrumentSymbol) is in the beginings of a trend weekly");
                        break;
                    case 0:
                        array_push($down, "$instrumentName ($instrumentSymbol) is not good");
                        break;
                }
            }
        }
        return array($opportunities, $down, $error);
    }

    public function analyzeAllExchanges()
    {
        $exchangeList = $this->getStockExchangeList();
        $opportunities = array();
        foreach($exchangeList as $exchange){
            $results = $this->analyzeExchange($exchange);
            array_push($opportunities, $results);
        }
        return $opportunities;
    }

    public function analyzeInstrumentData($instrumentData)
    {
        //$dataWeekly = $this->marketDataService->apiService($instrument, 'SMA', 'Weekly');


        if($instrumentData == 'error'){
            return 'error';
        }

        // Create a SMA method that will use the data
        //Create a MACD service

        $resultWeekly = $this->technicalAnalysisService->calculateSMATrend($instrumentData);

        if($resultWeekly > 0){
            $MACDWeekly = $this->technicalAnalysisService->calculateMACDCrossover($instrumentData);
        }

        if($resultWeekly == 3 && $MACDWeekly == 3){
            $result = 3;
        } elseif($resultWeekly == 2 && $MACDWeekly == 3){
            $result = 2;
        }elseif ($resultWeekly == 1 && $MACDWeekly == 3){
            $result = 1;
        }else{
            $result = 0;
        }

        return $result;
    }


    public function getStockInstrumentList($exchangeId)
    {
        // Get all the instruments for an exchange
        $instrumentMapper = $this->entityManager->getRepository(Instrument::class);
        $instruments = $instrumentMapper->findByexchange_id($exchangeId);
        return $instruments;
    }


}