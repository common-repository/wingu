<?php

declare(strict_types=1);

namespace Wingu\Engine\SDK\Model\Request;

interface RequestParameters
{
    const SORTING_ORDER_ASC  = 'ASC';
    const SORTING_ORDER_DESC = 'DESC';
    const SORTING_ORDER      = [self::SORTING_ORDER_ASC, self::SORTING_ORDER_DESC];

    /** @return string[] */
    public function toArray() : array;
}
