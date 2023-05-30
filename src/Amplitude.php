<?php

namespace Idez\Amplitude;

use Illuminate\Http\Client\PendingRequest;
use Illuminate\Http\Client\Response;
use Illuminate\Support\Facades\Http;

class Amplitude {
    private ?string $deviceId = null;
    private ?string $userId = null;
    private array $userProperties = [];

    const BASE_URL = 'https://api2.amplitude.com/2/httpapi';

    function __construct(
        private readonly ?string $apiKey
    ) {
    }

    public function setUser(string $userId, array $userProperties = []): self
    {
        $this->userId = $userId;
        $this->userProperties = $userProperties;

        return $this;
    }

    public function setDevice(string $deviceId): self
    {
        $this->deviceId = $deviceId;

        return $this;
    }

    public function event($event, $properties = []): Response
    {
        if(is_null($this->deviceId) && is_null($this->userId)){
            throw new \Exception('You must set a device or user');
        }

        return Http::post(self::BASE_URL, [
            "api_key" => $this->apiKey,
            "events" => [
                [
                    'user_id' => $this->userId,
                    'device_id' => $this->deviceId,
                    'event_type' => $event,
                    'event_properties' => $properties,
                    'user_properties' => $this->userProperties
                ]
            ]
        ]);
    }
}