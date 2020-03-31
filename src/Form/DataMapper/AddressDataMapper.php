<?php

declare(strict_types=1);

namespace App\Form\DataMapper;

use App\Entity\Address;
use App\Form\Model\AddressModel;
use DobryProgramator\SmartformBundle\Exception\SmartformFieldNotFilledException;
use DobryProgramator\SmartformBundle\Form\DataMapper\SmartformAddressMapper;

final class AddressDataMapper
{
    private SmartformAddressMapper $smartformAddressMapper;

    public function __construct(SmartformAddressMapper $smartformAddressMapper)
    {
        $this->smartformAddressMapper = $smartformAddressMapper;
    }

    /**
     * @throws SmartformFieldNotFilledException
     */
    public function mapEntityFromModel(Address $entity, AddressModel $model): void
    {
        $this->smartformAddressMapper->mapEntityFromModel($entity, $model->address);
    }

    public function mapModelFromEntity(Address $entity, AddressModel $model): void
    {
        $this->smartformAddressMapper->mapModelFromEntity($entity, $model->address);
    }
}
