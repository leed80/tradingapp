<?php
/**
 * Created by PhpStorm.
 * User: davidlee
 * Date: 15/05/2018
 * Time: 13:22
 */

namespace AppBundle\Service;

use \AppBundle\Service\MarketDataService;
use \AppBundle\Service\HttpRequestService;

class AlphaVantageService extends MarketDataService
{

    function __construct($apikey, $apiurl, HttpRequestService $apiService)
    {
        $this->apiKey = $apikey;
        $this->apiUrl = $apiurl;
    }

    /**
     *  Need methods that will build the url for alpha vantage and use the abtract getInstrument data method from the Market data service
     */



}