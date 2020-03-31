<?php

declare(strict_types=1);

namespace App\Form\Model;

use DobryProgramator\SmartformBundle\Form\Model\SmartformAddressModel;
use Symfony\Component\Validator\Constraints as Assert;

final class AddressModel
{
    /**
     * @Assert\Valid
     *
     * @var SmartformAddressModel
     */
    public $address;
}
