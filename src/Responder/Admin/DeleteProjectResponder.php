<?php
/**
 * Created by PhpStorm.
 * User: emilien
 * Date: 18/06/2018
 * Time: 09:42
 */

namespace App\Responder\Admin;
use Symfony\Component\HttpFoundation\Response;

class DeleteProjectResponder
{
    /**
     * @param string $result
     * @return Response
     */
    public function __invoke(string $result) :Response
    {
        $response = new Response($result);

        $response->headers->set('Content-Type', 'text/xml');

        return $response;

    }
}
