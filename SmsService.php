<?php

namespace App\Services\Sms;

use App\Services\Sms\Imp\MicroPayImp;

class SmsService
{
    private $smsProvider;

    public function __construct(MicroPayImp $smsProvider)
    {
        $this->smsProvider = $smsProvider;
    }

    public function send($params) {
        return $this->smsProvider->send($params);
    }
}