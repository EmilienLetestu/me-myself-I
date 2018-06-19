<?php
/**
 * Created by PhpStorm.
 * User: emilien
 * Date: 19/06/2018
 * Time: 16:38
 */

namespace App\Handler\Interfaces;


use Symfony\Component\Form\FormInterface;

Interface ContactHandlerInterface
{
    /**
     * @param FormInterface $form
     * @return bool
     */
    public function handle(FormInterface $form) :bool;
}