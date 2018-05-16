<?php
/**
 *  Abstract class for fetching market data
 */

namespace AppBundle\Service;


class MarketDataService
{
    protected $apiKey;
    protected $apiUrl;
    protected $httpRequestService;

    public function getHttpRequestService()
    {
        return $this->httpRequestService;
    }

    public function getInstrumentData($url)
    {
        return $this->getHttpRequestService()->getResponse($url);
    }



}