<?php

declare(strict_types=1);

namespace App\Controller;

use App\Entity\Address;
use App\Form\DataMapper\AddressDataMapper;
use App\Form\Model\AddressModel;
use App\Form\Type\AddressType;
use App\Repository\AddressRepository;
use DobryProgramator\SmartformBundle\Exception\SmartformFieldNotFilledException;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\ORMException;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

final class AddressController extends AbstractController
{
    private AddressRepository $addressRepository;
    private AddressDataMapper $addressDataMapper;

    public function __construct(
        AddressRepository $addressRepository,
        AddressDataMapper $addressDataMapper
    ) {
        $this->addressRepository = $addressRepository;
        $this->addressDataMapper = $addressDataMapper;
    }

    /**
     * @Route("/", name="page_address_index")
     *
     * @throws ORMException
     * @throws OptimisticLockException
     * @throws SmartformFieldNotFilledException
     */
    public function index(Request $request): Response
    {
        $addresses = $this->addressRepository->findAll();

        $addressModel = new AddressModel();
        $addressForm = $this->createForm(AddressType::class, $addressModel);

        $addressForm->handleRequest($request);
        if($addressForm->isSubmitted() && $addressForm->isValid()) {
            $address = new Address();
            $this->addressDataMapper->mapEntityFromModel($address, $addressModel);

            $this->addressRepository->save($address);
            $addresses[] = $address;
        }

        return $this->render(
            'address/index.html.twig',
            [
                'addresses' => $addresses,
                'address_form' => $addressForm->createView()
            ]
        );
    }
}
