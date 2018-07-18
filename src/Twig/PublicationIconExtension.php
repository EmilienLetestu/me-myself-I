<?php
/**
 * Created by PhpStorm.
 * User: emilien
 * Date: 18/07/2018
 * Time: 16:16
 */

namespace App\Twig;

use Twig\Extension\AbstractExtension;
use Twig\TwigFilter;

class PublicationIconExtension extends AbstractExtension
{
    public function getFilters()
    {
        return [
            new TwigFilter('publicationIcon', [$this, 'publicationIconFilter'])
        ];
    }

    public function publicationIconFilter(int $state)
    {
        return $state === 1 ? 'check' : 'close';
    }
}