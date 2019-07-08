<?php

namespace App\Http\Controllers;

use http\Client\Curl\User;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;



    protected function setSuccess($message){
        session()->flash('type', 'success');
        session()->flash('glyphicon', 'ok');
        session()->flash('message', $message);
    }

    protected function setWarning($message){
        session()->flash('type', 'danger');
        session()->flash('glyphicon', 'exclamation-sign');
        session()->flash('message', $message);
    }




}




