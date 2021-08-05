<?php

namespace App\Http\Controllers;

use App\Services\BaseService;
use App\Services\UrlService;
use Illuminate\Http\Request;

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

    public function redirect(Request $request)
    {
        $response = $this->service->redirect($request->path());

        if (!$response['status']) {
            return response()->json($response['errors'], 422);
        }

        return redirect()->away($response['data'][0]['url_original']);
    }
}
