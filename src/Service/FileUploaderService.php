<?php
/**
 * Created by PhpStorm.
 * User: emilien
 * Date: 15/06/2018
 * Time: 12:34
 */

namespace App\Service;


use App\Entity\Project;
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
     * @param Project $project
     * @return bool
     */
    public function updateFileName(Project $project)
    {
        $dir = $this->getTargetDir();
        $extension = explode('.',$project->getPictRef());

        return rename(
            $dir.'/'.$project->getPictRef(),
            $dir.'/'.$project->getName().'_pict.'.$extension
        );
    }

    /**
     * @param UploadedFile $file
     * @param string $projectName
     * @param string $fileToErase
     * @return string
     */
    public function eraseFileAndReplace(UploadedFile $file, string $projectName, string $fileToErase) :string
    {
        $dir = $this->getTargetDir();
        unlink($dir.'/'.$fileToErase);

        return $this->upload($file, $projectName);
    }

    /**
     * @return mixed
     */
    public function getTargetDir()
    {
        return $this->targetDir;
    }
}
