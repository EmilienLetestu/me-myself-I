<?php
/**
 * Created by PhpStorm.
 * User: emilien
 * Date: 19/06/2018
 * Time: 21:13
 */

namespace App\Responder;


use Symfony\Component\HttpFoundation\BinaryFileResponse;
use Symfony\Component\HttpFoundation\ResponseHeaderBag;

class ResumeDownloaderResponder
{
    /**
     * @param $file
     * @return BinaryFileResponse
     */
    public function __invoke($file)
    {
        $response = new BinaryFileResponse($file);

        $response->headers->set('Content-Type', $file);

        $response->setContentDisposition(
            ResponseHeaderBag::DISPOSITION_ATTACHMENT,
            'cv_dev_emilien_letestu.pdf'
        );

        return $response;
    }
}