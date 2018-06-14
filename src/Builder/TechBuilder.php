<?php
/**
 * Created by PhpStorm.
 * User: emilien
 * Date: 14/06/2018
 * Time: 18:21
 */

namespace App\Builder;


use App\Entity\Tech;

class TechBuilder
{
    /**
     * @var
     */
    private $tech;

    /**
     * @param string $name
     * @return TechBuilder
     */
    public function edit(string $name) :self
    {
        $this->tech = new Tech($name);

        return $this;
    }

    /**
     * @return Tech
     */
    public function getTech() :Tech
    {
        return $this->tech;
    }
}