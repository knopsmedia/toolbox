<?php

namespace Knops\ToolboxTests\Flysystem\Adapter;

use Knops\Toolbox\Flysystem\Adapter\CurlFtpAdapter;
use League\Flysystem\{AdapterTestUtilities\FilesystemAdapterTestCase, FilesystemAdapter};

class CurlFtpAdapterTest extends FilesystemAdapterTestCase
{
    protected static function createFilesystemAdapter(): FilesystemAdapter
    {
        return new CurlFtpAdapter();
    }
}