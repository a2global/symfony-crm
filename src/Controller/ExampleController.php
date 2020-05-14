<?php

namespace App\Controller;

use A2Global\CRMBundle\Datasheet\Datasheet;
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
        /** Array datasheet */

        $data = [
            ['id' => 1, 'name' => 'John', 'age' => '32'],
            ['id' => 2, 'name' => 'David', 'age' => '24'],
            ['id' => 3, 'name' => 'Peter', 'age' => '28'],
            ['id' => 1, 'name' => 'John', 'age' => '32'],
            ['id' => 2, 'name' => 'David', 'age' => '24'],
            ['id' => 3, 'name' => 'Peter', 'age' => '28'],
            ['id' => 1, 'name' => 'John', 'age' => '32'],
            ['id' => 2, 'name' => 'David', 'age' => '24'],
            ['id' => 3, 'name' => 'Peter', 'age' => '28'],
            ['id' => 1, 'name' => 'John', 'age' => '32'],
            ['id' => 2, 'name' => 'David', 'age' => '24'],
            ['id' => 3, 'name' => 'Peter', 'age' => '28'],
            ['id' => 1, 'name' => 'John', 'age' => '32'],
            ['id' => 2, 'name' => 'David', 'age' => '24'],
            ['id' => 3, 'name' => 'Peter', 'age' => '28'],
        ];
        $arrayDatasheet = new Datasheet($data);
        $arrayDatasheet
            ->setItemsPerPage(5)
            ->setItemsTotal(700)
        ;

        /** Query builder datasheet */

        $queryBuilder = $this->entityManager
            ->getRepository('App:Book')
            ->createQueryBuilder('b');

        $queryBuilderDatasheet = (new Datasheet($queryBuilder))
            ->setItemsPerPage(5)
            ->showFields('pages', 'price', 'title')
            ->addFieldHandler('title', function($item){
                return strtoupper($item['title']);
            });
//            ->setFieldOptions('author', ['filterBy' => 'name']);

        /** Complex query builder datasheet */

        $queryBuilder = $this->entityManager
            ->getRepository('App:Writer')
            ->createQueryBuilder('w')
            ->addSelect('w.id')
            ->addSelect('w.name')
            ->addSelect('b.title')
            ->addSelect('b.publishedAt AS lalalala')
            ->andWhere('b.publishedAt > :date')
            ->join('w.books', 'b')
            ->setParameter('date', '2020-01-01 00:00:00')
            ;
//        $sql = $queryBuilder->getQuery()->getSQL();
//        $res = $queryBuilder->getQuery()->getArrayResult();

        $advancedQueryBuilderDatasheet = (new Datasheet($queryBuilder))
            ->setItemsPerPage(5);

        /** Rendering examples */

        return $this->render('examples/examples.datasheets.html.twig', [
            'arrayDatasheet' => $arrayDatasheet,
            'queryBuilderDatasheet' => $queryBuilderDatasheet,
            'advancedQueryBuilderDatasheet' => $advancedQueryBuilderDatasheet,
        ]);
    }
}
