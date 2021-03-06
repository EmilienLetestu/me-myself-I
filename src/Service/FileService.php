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

class FileService
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
     * @return string
     */
    public function updateFileName(Project $project)
    {
        $dir = $this->getTargetDir();
        $extension = explode('.',$project->getPictRef());

        rename(
            $dir.'/'.$project->getPictRef(),
            $dir.'/'.$project->getName().'_pict.'.end($extension)
        );

        return $project->getName().'_pict.'.end($extension);
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
     * @param string $fileToErase
     */
    public function eraseFile(string $fileToErase)
    {
        if(file_exists($this->getTargetDir().'/'.$fileToErase))
        {
            unlink($this->getTargetDir().'/'.$fileToErase);
        }

    }

    /**
     * @return string
     */
    public function getTargetDir() :string
    {
        return $this->targetDir;
    }
}
