<?php

use Illuminate\Support\Facades\Route;
use mrmuminov\eskizuz\Eskiz;
use mrmuminov\eskizuz\types\sms\SmsSingleSmsType;

Route::get('/send-sms', function () {
    $eskiz = new Eskiz("your-email", "your-secret-code");

    $from = '4546';
    $message = 'Salom';
    $mobile_phone = '+998991903704';
    $user_sms_id = '1';
    $callback_url = '';
    $dispatch_id = '';
    $user_id = '1';

    $auth = $eskiz->requestAuthLogin();

    $singleSmsType = new SmsSingleSmsType(
        from: $from,
        message: $message,
        mobile_phone: $mobile_phone,
        user_sms_id: $user_sms_id,
        callback_url: $callback_url,
    );
    $sendSingleSms = $eskiz->requestSmsSend($singleSmsType);

    dd($sendSingleSms->getResponse()); // get sms response
});
