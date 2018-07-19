<?php
/**
 * Created by PhpStorm.
 * User: emilien
 * Date: 19/07/2018
 * Time: 13:06
 */

namespace App\Responder\Admin;


use Symfony\Component\HttpFoundation\Response;

class UpdateProjectStatusResponder
{
    /**
     * @param string $result
     * @return Response
     */
    public function __invoke(string  $result): Response
    {
        $response = new Response($result);
        $response->headers->set('Content-Type', 'text/xml');

        return $response;
    }
}