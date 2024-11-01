<?php

declare(strict_types=1);

namespace Wingu\Engine\SDK\Model\Response\Channel\Beacon;

class BeaconAddress
{
    /** @var string|null */
    private $formattedAddress;

    public function __construct(string $formattedAddress = null)
    {
        $this->formattedAddress = $formattedAddress;
    }

    public function formattedAddress()
    {
        return $this->formattedAddress;
    }
}
