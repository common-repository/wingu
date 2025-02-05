<?php

declare(strict_types=1);

namespace Wingu\Engine\SDK\Model\Response\Channel;

use Speicher210\BusinessHours\BusinessHoursInterface;
use Wingu\Engine\SDK\Model\Response\Content\Content;

trait PrivateChannelTrait
{
    /** @var string|null */
    private $note;

    /**
     * The flag if the channel is active.
     *
     * @var bool
     */
    private $active;

    /** @var Content|null */
    private $content;

    /**
     * The flag if the channel is published.
     *
     * @var bool
     */
    private $published;

    /**
     * The functioning hours of the channel.
     *
     * @var BusinessHoursInterface|null
     */
    private $functioningHours;

    /** @var bool */
    private $inFunctioningHours;

    public function note()
    {
        return $this->note;
    }

    public function isActive() : bool
    {
        return $this->active;
    }

    public function content()
    {
        return $this->content;
    }

    public function isPublished() : bool
    {
        return $this->published;
    }

    public function functioningHours()
    {
        return $this->functioningHours;
    }

    public function isInFunctioningHours() : bool
    {
        return $this->inFunctioningHours;
    }
}
