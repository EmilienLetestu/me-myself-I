<?php
/**
 * Created by PhpStorm.
 * User: emilien
 * Date: 19/06/2018
 * Time: 20:54
 */

namespace App\Action;


use App\Responder\ResumeDownloaderResponder;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;

class ResumeDownloaderAction extends Controller
{
    /**
     * @param ResumeDownloaderResponder $responder
     * @return \Symfony\Component\HttpFoundation\Response
     *
     * @Route(
     *     "/resume/download",
     *     name="resumeDwld"
     * )
     */
    public function __invoke(ResumeDownloaderResponder $responder)
    {
        return
            $responder( '../public/resume/cv_dev_emilien_letestu.pdf')
        ;


    }
}