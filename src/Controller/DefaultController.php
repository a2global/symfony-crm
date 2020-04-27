<?php

namespace App\Controller;

use A2Global\CRMBundle\Factory\DatasheetFactory;
use A2Global\CRMBundle\Factory\FormFactory;
use App\Entity\Client;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\QueryBuilder;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends AbstractController
{
    private $entityManager;

    private $formFactory;

    private $datasheetFactory;

    public function __construct(
        EntityManagerInterface $entityManager,
        FormFactory $formFactory,
        DatasheetFactory $datasheetFactory
    )
    {
        $this->entityManager = $entityManager;
        $this->formFactory = $formFactory;
        $this->datasheetFactory = $datasheetFactory;
    }

    /** @Route("/", name="homepage") */
    public function index()
    {
        return $this->render('homepage.html.twig');
    }

    /** @Route("/sample/datasheet", name="test") */
    public function test()
    {
        /** @var QueryBuilder $queryBuilder */
        $queryBuilder = $this->entityManager->getRepository('App:Client')->createQueryBuilder('c');
//        $queryBuilder
//            ->andWhere('w.birthday < :date')
//            ->setParameter('date', '2020-01-01');

        $arrayDatasheet = $this->datasheetFactory->createNew()
            ->setQueryBuilder($queryBuilder)
            ->removeField('relationCompany')
            ->addField('relationCompany.place.street', 'Street')
            ->addField('relationCompany.place.house', 'House')
        ;

        return $this->render('@A2CRM/samples/homepage.html.twig', [
            'arrayDatasheet' => $arrayDatasheet,
        ]);
    }

    /** @Route("/sample/form", name="sample_form") */
    public function sampleForm()
    {
        $clientCreateForm = $this->formFactory->getFor(new Client());
        $client = $this->entityManager->getRepository('App:Client')->find(1);
        $clientUpdateForm = $this->formFactory->getFor($client);

        return $this->render('samples/forms.html.twig', [
            'clientCreateForm' => $clientCreateForm,
            'clientUpdateForm' => $clientUpdateForm,
        ]);

    }
}
