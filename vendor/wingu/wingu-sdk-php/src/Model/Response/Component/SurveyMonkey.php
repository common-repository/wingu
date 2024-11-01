<?php

declare(strict_types=1);

namespace Wingu\Engine\SDK\Model\Response\Component;

class SurveyMonkey implements Component
{
    use ComponentTrait;

    /** @var string|null */
    private $title;

    /** @var string|null */
    private $description;

    /** @var string */
    private $surveyURL;

    public function __construct(
        string $id,
        \DateTime $updatedAt,
        string $title = null,
        string $description = null,
        string $surveyURL
    ) {
        $this->id          = $id;
        $this->updatedAt   = $updatedAt;
        $this->title       = $title;
        $this->description = $description;
        $this->surveyURL   = $surveyURL;
    }

    public function title()
    {
        return $this->title;
    }

    public function description()
    {
        return $this->description;
    }

    public function surveyURL() : string
    {
        return $this->surveyURL;
    }
}
