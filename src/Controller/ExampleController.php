<?php

namespace App\Controller;

use A2Global\CRMBundle\Factory\DatasheetFactory;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

/** @Route("/examples/", name="examples_") */
class ExampleController extends AbstractController
{
    private $entityManager;

    private $datasheetFactory;

    public function __construct(
        EntityManagerInterface $entityManager,
        DatasheetFactory $datasheetFactory
    )
    {
        $this->entityManager = $entityManager;
        $this->datasheetFactory = $datasheetFactory;
    }

    /** @Route("datasheets", name="datasheets") */
    public function datasheetsAction()
    {
        /**
         * Simple datasheet
         *
         * Create queryBuilder from repository and define alias, only object fields will be available.
         * In this case you may call related fields in format: writer.address.street
         */

        $queryBuilder = $this->entityManager
            ->getRepository('App:Book')
            ->createQueryBuilder('b');

        $simpleDatasheet = $this->datasheetFactory
            ->createNew()
            ->setQueryBuilder($queryBuilder);

        /**
         * Advanced datasheet

         * Create queryBuilder and select additional fields (not only from Object)
         * In this case you may can not call related fields in format: writer.address.street,
         * you must select it in DQL manually: ->addSelect('another_alias.field_name')
         */

        $queryBuilder = $this->entityManager
            ->getRepository('App:Writer')
            ->createQueryBuilder('w')
            ->addSelect('w.id')
            ->addSelect('w.name')
            ->addSelect('b.title')
            ->join('w.books', 'b');

        $advancedDatasheet = $this->datasheetFactory
            ->createNew()
            ->setQueryBuilder($queryBuilder);

        /**
         * Rendering examples
         */

        return $this->render('examples/examples.datasheets.html.twig', [
            'simpleDatasheet' => $simpleDatasheet,
            'advancedDatasheet' => $advancedDatasheet,
        ]);
    }
}
