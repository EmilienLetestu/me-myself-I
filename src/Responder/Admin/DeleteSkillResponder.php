<?php
/**
 * Created by PhpStorm.
 * User: emilien
 * Date: 17/06/2018
 * Time: 21:58
 */

namespace App\Responder\Admin;

use Symfony\Component\HttpFoundation\Response;

class DeleteSkillResponder
{
    /**
     * @param string $result
     * @return Response
     */
    public function __invoke(string $result): Response
    {
        $response = new Response($result);

        $response->headers->set('Content-Type', 'text/xml');

        return $response;
    }
}
