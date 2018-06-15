<?php
/**
 * Created by PhpStorm.
 * User: emilien
 * Date: 15/06/2018
 * Time: 12:34
 */

namespace App\Service;


use Symfony\Component\HttpFoundation\File\UploadedFile;

class FileUploaderService
{
    /**
     * @var
     */
    private $targetDir;

    /**
     * FileUploaderService constructor.
     * @param $targetDir
     */
    public function __construct($targetDir)
    {
        $this->targetDir = $targetDir;
    }

    /**
     * @param UploadedFile $file
     * @param string $projectName
     * @return string
     */
    public function upload(UploadedFile $file, string $projectName) :string
    {
        $fileName = $projectName.'_pict.'.$file->guessExtension();

        $file->move($this->getTargetDir(), $fileName);

        return $fileName;
    }

    /**
     * @return mixed
     */
    public function getTargetDir()
    {
        return $this->targetDir;
    }
}
