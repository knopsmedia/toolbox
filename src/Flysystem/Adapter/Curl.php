<?php

namespace Knops\Toolbox\Flysystem\Adapter;

class Curl
{
    private \CurlHandle $handle;
    private array $options = [];

    public function __construct()
    {
        $this->handle = \curl_init();
    }

    public function setOptions(array $options): self
    {
        $this->options = $options;

        return $this;
    }

    public function setOption(string $option, mixed $value): self
    {
        $this->options[$option] = $value;

        return $this;
    }
}