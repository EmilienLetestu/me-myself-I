<?php
/**
 * Created by PhpStorm.
 * User: emilien
 * Date: 18/06/2018
 * Time: 14:53
 */

namespace App\Handler\Interfaces;


use App\Entity\Tech;
use Symfony\Component\Form\FormInterface;

Interface UpdateTechHandlerInterface
{
    /**
     * @param FormInterface $form
     * @param Tech $tech
     * @return bool
     */
    public function handle(FormInterface $form, Tech $tech) :bool;
}