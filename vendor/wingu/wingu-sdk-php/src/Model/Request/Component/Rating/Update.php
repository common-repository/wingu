<?php

declare(strict_types=1);

namespace Wingu\Engine\SDK\Model\Request\Component\Rating;

use Wingu\Engine\SDK\Model\Request\Request;

final class Update implements Request
{
    /** @var string|null */
    private $title;

    public function __construct(string $title = null)
    {
        $this->title = $title;
    }

    /** @inheritdoc */
    public function jsonSerialize() : array
    {
        return \array_filter([
            'title' => $this->title,
        ]);
    }
}
