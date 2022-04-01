<?php

namespace Knops\Toolbox\Flysystem\Adapter;

use League\Flysystem\{FileAttributes, FilesystemAdapter, FilesystemException};

class CurlFtpAdapter implements FilesystemAdapter
{
    public function fileExists(string $path): bool
    {
        try {
            $this->fileSize($path);
            return true;
        } catch (FilesystemException) {}

        return false;
    }

    public function visibility(string $path): FileAttributes
    {
        // TODO: Implement visibility() method.
    }
}