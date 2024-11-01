<?php

declare(strict_types=1);

namespace Wingu\Engine\SDK\Api;

final class Configuration
{
    const BACKEND_URL_PRODUCTION = 'https://wingu-engine.de';

    const BACKEND_URL_SANDBOX = 'https://wingu-engine-staging.de';

    const API_KEY_HEADER = 'X-API-KEY';

    /** @var string|null */
    private $apiKey;

    /** @var string */
    private $backendUrl;

    public function __construct(string $apiKey = null, string $backendUrl = self::BACKEND_URL_PRODUCTION)
    {
        $this->apiKey     = $apiKey;
        $this->backendUrl = $backendUrl;
    }

    public function apiKey()
    {
        return $this->apiKey;
    }

    public function backendUrl() : string
    {
        return $this->backendUrl;
    }

    public function apiKeyHeader() : string
    {
        return self::API_KEY_HEADER;
    }
}
