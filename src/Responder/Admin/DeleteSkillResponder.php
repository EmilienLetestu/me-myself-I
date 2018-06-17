<?php
/**
 * Created by PhpStorm.
 * User: emilien
 * Date: 17/06/2018
 * Time: 21:58
 */

namespace App\Responder\Admin;


use Symfony\Component\HttpFoundation\RedirectResponse;

class DeleteSkillResponder
{
    /**
     * @param string $redirection
     * @return RedirectResponse
     */
    public function __invoke(string $redirection)
    {
        return new RedirectResponse($redirection);
    }
}
