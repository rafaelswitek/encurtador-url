<?php

namespace App\Services;

use App\Models\Url;

class UrlService extends BaseService
{
    protected function getModel(): Url
    {
        return new Url;
    }

    protected function getRules(bool $saving): array
    {
        return [
            
        ];
    }
}