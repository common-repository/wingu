<?php

declare(strict_types=1);

namespace Wingu\Engine\SDK\Model\Response\Component;

use Assert\Assertion;
use Wingu\Engine\SDK\Model\Response\Component\ContactAddress as Address;
use Wingu\Engine\SDK\Model\Response\Component\ContactExternalLinks as ExternalLinks;

final class Contact implements Component
{
    use ComponentTrait;

    /** @var string|null */
    private $companyName;

    /** @var string|null */
    private $personalTitle;

    /** @var string|null */
    private $firstName;

    /** @var string|null */
    private $lastName;

    /** @var string|null */
    private $email;

    /** @var string|null */
    private $mobile;

    /** @var string|null */
    private $phone;

    /** @var string|null */
    private $website;

    /** @var string|null */
    private $openingHours;

    /** @var string|null */
    private $extraInfo;

    /** @var Address|null */
    private $address;

    /** @var ExternalLinks|null */
    private $externalLinks;

    public function __construct(
        string $id,
        \DateTime $updatedAt,
        string $companyName = null,
        string $personalTitle = null,
        string $firstName = null,
        string $lastName = null,
        string $email = null,
        string $mobile = null,
        string $phone = null,
        string $website = null,
        string $openingHours = null,
        string $extraInfo = null,
        Address $address = null,
        ExternalLinks $externalLinks = null
    ) {
        Assertion::nullOrEmail($email);

        $this->id            = $id;
        $this->updatedAt     = $updatedAt;
        $this->companyName   = $companyName;
        $this->personalTitle = $personalTitle;
        $this->firstName     = $firstName;
        $this->lastName      = $lastName;
        $this->email         = $email;
        $this->mobile        = $mobile;
        $this->phone         = $phone;
        $this->website       = $website;
        $this->openingHours  = $openingHours;
        $this->extraInfo     = $extraInfo;
        $this->address       = $address;
        $this->externalLinks = $externalLinks;
    }

    public function companyName()
    {
        return $this->companyName;
    }

    public function personalTitle()
    {
        return $this->personalTitle;
    }

    public function firstName()
    {
        return $this->firstName;
    }

    public function lastName()
    {
        return $this->lastName;
    }

    public function email()
    {
        return $this->email;
    }

    public function mobile()
    {
        return $this->mobile;
    }

    public function phone()
    {
        return $this->phone;
    }

    public function website()
    {
        return $this->website;
    }

    public function openingHours()
    {
        return $this->openingHours;
    }

    public function extraInfo()
    {
        return $this->extraInfo;
    }

    public function address()
    {
        return $this->address;
    }

    public function externalLinks()
    {
        return $this->externalLinks;
    }
}
