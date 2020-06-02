<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{

    /**
     * @SWG\Swagger(
     *     basePath="/api/v1",
     *     @SWG\Info(
     *         version="1.0.0",
     *         title="COVID 19 (Coronavirus) Mobile API",
     *         description="Informative application for COVID 19",
     *         @SWG\Contact(
     *             email="omprakashjagri2050@gmail.com"
     *         ),
     *     )
     * )
     */


    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
}
