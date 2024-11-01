<?php

declare(strict_types=1);

namespace Wingu\Engine\SDK\Model\Request;

final class BooleanValue implements \JsonSerializable
{
    /** @var bool|null */
    private $value;

    public function __construct(bool $value = null)
    {
        $this->value = $value;
    }

    public function value()
    {
        return $this->value;
    }

    public function jsonSerialize()
    {
        {
        if ($this->value === true) {
            return '1';
        }
        if ($this->value === false) {
            return '0';
        }
            return null;
        }
    }
}
