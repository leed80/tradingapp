<?php
/**
 * Created by PhpStorm.
 * User: davidlee
 * Date: 01/11/2017
 * Time: 15:05
 */

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
/**
 * @ORM\Entity
 * @ORM\Table(name="Exchange")
 */
class Exchange
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
     * @ORM\Column(type="string", length=100)
     */
    private $code;




    public function setID($id){
        $this->id = $id;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function setCode($code)
    {
        $this->code = $code;
    }

    public function getID()
    {
        return $this->id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getCode()
    {
        return $this->code;
    }



}