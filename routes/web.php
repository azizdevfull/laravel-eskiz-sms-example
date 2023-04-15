<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use mrmuminov\eskizuz\Eskiz;
use mrmuminov\eskizuz\types\sms\SmsSingleSmsType;

// use Mrmuminov\EskizUz\EskizUz;

Route::get('/send-sms', function () {
    $eskiz = new Eskiz("your-email", "your-secret-code");

    /**
     * Declare variables
     */
    $from = '4546';
    $message = 'Salom';
    $mobile_phone = '+998991903704';
    $user_sms_id = '1';
    $callback_url = '';
    $dispatch_id = '';
    $user_id = '1';
    /**
     * First, you need to create a new Eskiz object with email and password.
     */
    $auth = $eskiz->requestAuthLogin();

    /**
     * First, you need to create a new Eskiz object with email and password.
     * gateway-number is the number you want to send the SMS to. Default is 4649.
     */
    $singleSmsType = new SmsSingleSmsType(
        from: $from,
        message: $message,
        mobile_phone: $mobile_phone,
        user_sms_id: $user_sms_id,
        callback_url: $callback_url,
    );
    $sendSingleSms = $eskiz->requestSmsSend($singleSmsType);

    // return $sendSingleSms->response()->;
    dd($sendSingleSms->getResponse());
});
