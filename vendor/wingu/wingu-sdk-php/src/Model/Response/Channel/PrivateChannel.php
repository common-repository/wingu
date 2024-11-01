<?php

declare(strict_types=1);

namespace Wingu\Engine\SDK\Model\Response\Channel;

use Speicher210\BusinessHours\BusinessHoursInterface;
use Wingu\Engine\SDK\Model\Response\Content\Content;

interface PrivateChannel extends Channel
{
    public function note();

    public function isActive() : bool;

    public function content();

    public function isPublished() : bool;

    public function functioningHours();

    public function isInFunctioningHours() : bool;
}
