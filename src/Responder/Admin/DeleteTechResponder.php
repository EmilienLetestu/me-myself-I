<?php
/**
 * Created by PhpStorm.
 * User: emilien
 * Date: 18/06/2018
 * Time: 09:22
 */

namespace App\Responder\Admin;


use Symfony\Component\HttpFoundation\RedirectResponse;

class DeleteTechResponder
{
    /**
     * @param string $redirection
     * @return RedirectResponse
     */
    public function __invoke(string $redirection) :RedirectResponse
    {
        return new RedirectResponse($redirection);
    }
}