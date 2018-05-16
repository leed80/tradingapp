<?php

namespace AppBundle\Service;


class CURLService
{

    private function initialise()
    {
        return curl_init();
    }

    private function close($ch)
    {
        return curl_close($ch);
    }

    public function getResponse($url, $post=0)
    {
        $ch = $this->initialise();
        curl_setopt($ch,CURLOPT_URL,$url);
        curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
        if($post === 1){
            curl_setopt($ch,CURLOPT_POST, true);
        }
        $response = curl_exec($ch);
        $this->close($ch);
        return $response;
    }
}