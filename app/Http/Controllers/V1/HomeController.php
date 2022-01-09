<?php

namespace App\Http\Controllers\V1;

use App\Mail\OrderShipped;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Cache;

class HomeController extends Controller
{
    public function __invoke() {
        /*Mail::to("fahmiderbali@gmail.com")
            ->from("noreply@funnymemes.com")
            ->send(new OrderShipped());
        return new OrderShipped();*/
        return [
            'success' => true,
            'message' => __('messages.welcome'),
            'data' => [
                'service' => 'Funny memes',
                'version' => '1.0',
                'langue' =>app()->getLocale(),
                'support' => 'fahmiderbali@gmail.com',
            ]
        ];
    }
}
