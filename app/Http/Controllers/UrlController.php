<?php

namespace App\Http\Controllers;

use App\Services\BaseService;
use App\Services\UrlService;

class UrlController extends BaseController
{
   /**
     * @var UrlService
     */
    protected BaseService $service;

    public function __construct(UrlService $service)
    {
        $this->service = $service;
    }
}
