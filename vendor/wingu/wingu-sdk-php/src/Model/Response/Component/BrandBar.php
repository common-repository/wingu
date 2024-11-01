<?php

declare(strict_types=1);

namespace Wingu\Engine\SDK\Model\Response\Component;

final class BrandBar implements Component
{
    use ComponentTrait;

    /** @var BrandBarBackground|null */
    private $background;

    /** @var BrandBarText|null */
    private $text;

    /** @var BrandBarImage|null */
    private $image;

    public function __construct(
        string $id,
        \DateTime $updatedAt,
        BrandBarBackground $background = null,
        BrandBarText $text = null,
        BrandBarImage $image = null
    ) {
        if ($text === null && $image === null) {
            throw new \InvalidArgumentException('BrandBar requires either Text or Image, or both');
        }

        $this->id         = $id;
        $this->updatedAt  = $updatedAt;
        $this->background = $background;
        $this->text       = $text;
        $this->image      = $image;
    }

    public function background()
    {
        return $this->background;
    }

    public function text()
    {
        return $this->text;
    }

    public function image()
    {
        return $this->image;
    }
}
