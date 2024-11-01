<?php

declare(strict_types=1);

namespace Wingu\Engine\SDK\Model\Request\Channel\Beacon;

use Wingu\Engine\SDK\Model\Request\Request;

final class BeaconLocation implements Request
{
    /** @var Coordinates|null */
    private $coordinates;

    /** @var BeaconAddress|null */
    private $address;

    public function __construct(Coordinates $coordinates = null, BeaconAddress $address = null)
    {
        $this->coordinates = $coordinates;
        $this->address     = $address;
    }

    /** @inheritdoc */
    public function jsonSerialize() : array
    {
        return [
            'coordinates' => $this->coordinates,
            'address'  => $this->address,
        ];
    }
}
