<?php

declare(strict_types=1);

namespace Wingu\Engine\SDK\Model\Request\Component\BrandBar\Text;

use Wingu\Engine\SDK\Assertion;
use Wingu\Engine\SDK\Model\Request\Request;

final class Update implements Request
{
    const ALIGNMENT = ['left', 'center', 'right'];

    /** @var string|null */
    private $text;

    /** @var string|null */
    private $alignment;

    /** @var string|null */
    private $color;

    public function __construct(string $text = null, string $alignment = null, string $color = null)
    {
        Assertion::nullOrInArray($alignment, self::ALIGNMENT);
        $this->text      = $text;
        $this->alignment = $alignment;
        $this->color     = $color;
    }

    /** @inheritdoc */
    public function jsonSerialize() : array
    {
        return \array_filter([
            'text' => $this->text,
            'alignment' => $this->alignment,
            'color' => $this->color,
        ]);
    }
}
