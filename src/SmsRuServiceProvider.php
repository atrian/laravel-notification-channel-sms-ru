<?php

namespace NotificationChannels\SmsRu;

use Illuminate\Support\ServiceProvider;

class SmsRuServiceProvider extends ServiceProvider
{
    /**
     * Register the application services.
     */
    public function register()
    {
        $this->app->singleton(SmsRuApi::class, function ($app) {
            $apiId = \Config::get('services')['sms_ru']['api_id'];
            $client = new SmsRuApi(new \Zelenin\SmsRu\Auth\ApiIdAuth($apiId), new \Zelenin\SmsRu\Client\Client());
            return $client;
        });
    }

    public function provides(): array
    {
        return [
            SmsRuApi::class,
        ];
    }
}
