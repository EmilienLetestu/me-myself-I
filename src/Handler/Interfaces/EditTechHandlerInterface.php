<?php
/**
 * Created by PhpStorm.
 * User: emilien
 * Date: 13/06/2018
 * Time: 18:47
 */

namespace App\Handler\Interfaces;


use App\Entity\Tech;
use Symfony\Component\Form\FormInterface;

interface EditTechHandlerInterface
{
    public function handle(FormInterface $form, Tech $tech):bool;
}