<?php

declare(strict_types=1);

namespace App\Form\Type;

use App\Form\Model\AddressModel;
use DobryProgramator\SmartformBundle\Form\Type\SmartformWholeAddressType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

final class AddressType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add(
                'address',
                SmartformWholeAddressType::class,
                [
                    'label' => 'Address'
                ]
            )
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults(
            [
                'data_class' => AddressModel::class
            ]
        );
    }

    public function getBlockPrefix(): string
    {
        return 'app_address_';
    }
}
