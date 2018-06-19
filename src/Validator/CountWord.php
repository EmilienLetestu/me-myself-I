<?php
/**
 * Created by PhpStorm.
 * User: emilien
 * Date: 19/06/2018
 * Time: 11:31
 */

namespace App\Validator;


use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\Exception\MissingOptionsException;

class CountWord extends Constraint
{
    /**
     * @var string
     */
    public $message = 'Le texte doit contenir entre ';

    /**
     * @var
     */
    public $min;

    /**
     * @var
     */
    public $max;

    /**
     * CountWord constructor.
     * @param null $options
     */
    public function __construct($options = null)
    {
        if (null !== $options && !is_array($options)) {
            $options = array(
                'min' => $options,
                'max' => $options,
            );
        }

        parent::__construct($options);

        if (null === $this->min && null === $this->max) {
            throw new MissingOptionsException(sprintf('Définissez au moins l\'une de ces deux options "min" or "max"  %s', __CLASS__), array('min', 'max'));
        }
    }

    /**
     * @return mixed
     */
    public function getLimit()
    {
        return $this->limit;
    }
    /**
     * @return string
     */
    public function validatedBy()
    {
        return get_class($this).'Validator';
    }


}