<?php

namespace App\Http\Controllers\V1;

use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function __invoke(): array{
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
