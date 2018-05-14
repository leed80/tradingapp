<?php
/**
 * Created by PhpStorm.
 * User: davidlee
 * Date: 12/01/2018
 * Time: 14:27
 */

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="MarketPositions")
 */

class MarketPositions
{
    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\Column(type="integer", length=100)
     */
    private $instrument;

    /**
     * @ORM\Column(type="datetime")
     */
    private $open_date;

    /**
     * @param $id@ORM\Column(type="datetime")
     */
    private $close_date;

    /**
     * @ORM\Column(type="float")
     */
    private $result;

    /**
     * @ORM\Column(type="float")
     */
    private $interest_rate;

    /**
     * @ORM\Column(type="float")
     */
    private $commission;

    /**
     * @ORM\Column(type="float")
     */
    private $dividend;

    public function setID($id){
        $this->id = $id;
    }

    public function setInstrument($instrument)
    {
        $this->instrument = $instrument;
    }

    public function setOpenDate($open_date)
    {
        $this->open_date = $open_date;
    }
    
    public function setCloseDate($close_date)
    {
        $this->close_date = $close_date;
    }

    public function setResult($result)
    {
        $this->result = $result;
    }

    public function setInterestRate($interest_rate)
    {
        $this->interest_rate = $interest_rate;
    }

    public function setCommission($commission)
    {
        $this->commission = $commission;
    }
    
    public function setDividend($dividend)
    {
        $this->dividend = $dividend;
    }

    public function getID($id){
        return $this->id;
    }

    public function getInstrument($instrument)
    {
        return $this->instrument;
    }

    public function getOpenDate($open_date)
    {
        return $this->open_date;
    }

    public function getCloseDate($close_date)
    {
        return $this->close_date;
    }

    public function getResult($result)
    {
        return $this->result;
    }

    public function getInterestRate($interest_rate)
    {
        return $this->interest_rate;
    }

    public function getCommission($commission)
    {
        return $this->commission;
    }

    public function getDividend($dividend)
    {
        return $this->dividend;
    }
}