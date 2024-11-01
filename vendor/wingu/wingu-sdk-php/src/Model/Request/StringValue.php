<?php

declare(strict_types=1);

namespace Wingu\Engine\SDK\Model\Request;

final class StringValue implements \JsonSerializable
{
    /** @var string|null */
    private $value;

    public function __construct(string $value = null)
    {
        $this->value = $value;
    }

    public function value()
    {
        return $this->value;
    }

    public function jsonSerialize()
    {
        return $this->value;
    }
}
