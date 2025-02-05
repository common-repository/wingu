<?php

declare(strict_types=1);

namespace Wingu\Engine\SDK\Model\Response\Component;

final class AudioPlaylistAlbum
{
    /** @var string|null */
    private $name;

    /** @var AudioPlaylistCover|null */
    private $cover;

    public function __construct(string $name = null, AudioPlaylistCover $cover = null)
    {
        $this->name  = $name;
        $this->cover = $cover;
    }

    public function name()
    {
        return $this->name;
    }

    public function cover()
    {
        return $this->cover;
    }
}
