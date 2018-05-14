<?php
/**
 * Created by PhpStorm.
 * User: davidlee
 * Date: 02/11/2017
 * Time: 14:37
 */

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="Instrument")
 */
class Instrument
{
    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $name;

    /**
     * @ORM\Column(type="integer", length=1000)
     */
    private $exchangeId;

    /**
     * @ORM\Column(type="integer", length=1)
     */
    private $trading212;

    /**
     * @ORM\Column(type="string", length=500)
     */
    private $instrument_name;


    public function setID($id){
        $this->id = $id;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function setExchangeId($exchangeId)
    {
        $this->exchangeId = $exchangeId;
    }

    public function setTrading212($trading212)
    {
        $this->trading212 = $trading212;
    }

    public function setInstrumentName($instrument_name)
    {
        $this->instrument_name = $instrument_name;
    }

    public function getID()
    {
        return $this->id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getExchangeId()
    {
        return $this->exchangeId;
    }

    public function getTrading212()
    {
        return $this->trading212;
    }

    public function getInstrumentName()
    {
        return $this->instrument_name;
    }
}