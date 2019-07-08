<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\FileManipulator;
use Spatie\MediaLibrary\Models\Media as BaseMedia;
use Spatie\MediaLibrary\Helpers\File;

class Media extends BaseMedia
{

    public function updateFile($newFile) {
        $fileName        = $newFile->getClientOriginalName();
        $fileName        = $this->sanitizeFileName($fileName);
        $currentFileName = $this->file_name;
        $path            = $newFile->path();
        $fileSystem      = app(\Spatie\MediaLibrary\Filesystem\Filesystem::class);

        $this->name      = pathinfo($fileName, PATHINFO_FILENAME);
        $this->file_name = $fileName;
        $this->mime_type = File::getMimetype($path);
        $this->size      = filesize($path);

//        $fileSystem->removeFile($this);

        // overwrite current file keep old name
        $fileSystem->copyToMediaLibrary($path, $this, false, $currentFileName);

        // when this model is saved, the file will be renamed appropriately to $fileName via $media->file_name
    }

    public function setCustomProperties(array $properties) {
        foreach ($properties as $key => $val) {
            $this->setCustomProperty($key, $val);
        }
    }

    protected function sanitizeFileName(string $fileName): string {
        return str_replace(['#', '/', '\\'], '-', $fileName);
    }

    public function regenerate(){

        /** @var FileManipulator $fileManipulator */
        $fileManipulator = app(FileManipulator::class);
        $fileManipulator->createDerivedFiles($this);
    }



}

