<?php

declare(strict_types=1);

namespace Wingu\Engine\SDK\Model\Response\Component;

final class ContactExternalLinks
{
    /** @var string */
    private $id;

    /** @var string|null */
    private $facebookUrl;

    /** @var string|null */
    private $twitterUrl;

    /** @var string|null */
    private $googlePlusUrl;

    /** @var string|null */
    private $yelpUrl;

    /** @var string|null */
    private $facebookName;

    /** @var string|null */
    private $twitterName;

    /** @var string|null */
    private $googlePlusName;

    /** @var string|null */
    private $yelpName;

    public function __construct(
        string $id,
        string $facebookUrl = null,
        string $twitterUrl = null,
        string $googlePlusUrl = null,
        string $yelpUrl = null,
        string $facebookName = null,
        string $twitterName = null,
        string $googlePlusName = null,
        string $yelpName = null
    ) {
        $this->id             = $id;
        $this->facebookUrl    = $facebookUrl;
        $this->twitterUrl     = $twitterUrl;
        $this->googlePlusUrl  = $googlePlusUrl;
        $this->yelpUrl        = $yelpUrl;
        $this->facebookName   = $facebookName;
        $this->twitterName    = $twitterName;
        $this->googlePlusName = $googlePlusName;
        $this->yelpName       = $yelpName;
    }

    public function id() : string
    {
        return $this->id;
    }

    public function facebookUrl()
    {
        return $this->facebookUrl;
    }

    public function twitterUrl()
    {
        return $this->twitterUrl;
    }

    public function googlePlusUrl()
    {
        return $this->googlePlusUrl;
    }

    public function yelpUrl()
    {
        return $this->yelpUrl;
    }

    public function facebookName()
    {
        return $this->facebookName;
    }

    public function twitterName()
    {
        return $this->twitterName;
    }

    public function googlePlusName()
    {
        return $this->googlePlusName;
    }

    public function yelpName()
    {
        return $this->yelpName;
    }
}
