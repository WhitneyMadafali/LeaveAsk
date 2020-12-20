<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use Newsletter;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function store(Request $request)
{
    if ( ! Newsletter::isSubscribed($request->email) ) {
        Newsletter::subscribe($request->email, ['name'=>'ENTER_FIRST_NAME']);
        Newsletter::delete('SUBSCRIBER_EMAIL');

    }
}
}
