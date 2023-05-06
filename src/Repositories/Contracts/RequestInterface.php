<?php

namespace Werify\Laravel\Repositories\Contracts;

interface RequestInterface
{
    public function generateApiUrl(string $path,string $service=null): string;

    public function getHeaders($token = null): array;
}
