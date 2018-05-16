<?php

namespace AppBundle\Service;

use AppBundle\Service\CURLService;

class HttpRequestService extends CURLService
{
    public function getResponse($url)
    {
        return $this->getResponse($url);
    }

    public function getResponsePost($url)
    {
        return $this->getResponse($url, 1);
    }


}