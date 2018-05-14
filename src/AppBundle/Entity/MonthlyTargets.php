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
 * @ORM\Table(name="MonthlyTargets")
 */
class MonthlyTargets
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
    private $month;

    /**
     * @ORM\Column(type="float")
     */
    private $target;

    public function setID($id){
        $this->id = $id;
    }

    public function setMonth($month)
    {
        $this->month = $month;
    }

    public function setTarget($target)
    {
        $this->target = $target;
    }

    public function getID()
    {
        return $this->id;
    }

    public function getMonth()
    {
        return $this->name;
    }

    public function getTarget()
    {
        return $this->exchangeId;
    }
}