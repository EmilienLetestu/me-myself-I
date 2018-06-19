<?php
/**
 * Created by PhpStorm.
 * User: emilien
 * Date: 19/06/2018
 * Time: 11:37
 */

namespace App\Validator;

use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;

class CountWordValidator extends ConstraintValidator
{
    /**
     * @param mixed $value
     * @param Constraint $constraint
     */
    public function validate($value, Constraint $constraint)
    {
        $count = str_word_count(strip_tags($value));

        if ($count > $constraint->max || $count < $constraint->min)
        {
            $this->context
                ->buildViolation($constraint->message . $constraint->min . ' et ' . $constraint->max . ' mots')
                ->addViolation()
            ;
        }

    }
}