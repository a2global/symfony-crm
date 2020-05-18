<?php

namespace App\Controller;

use A2Global\CRMBundle\Datasheet\Datasheet;
use A2Global\CRMBundle\Factory\DatasheetFactory;
use A2Global\CRMBundle\Factory\FormFactory;
use App\Entity\Book;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

/** @Route("/examples/", name="examples_") */
class ExampleController extends AbstractController
{
    private $entityManager;

    private $datasheetFactory;

    private $formFactory;

    public function __construct(
        EntityManagerInterface $entityManager,
        DatasheetFactory $datasheetFactory,
        FormFactory $formFactory
    )
    {
        $this->entityManager = $entityManager;
        $this->datasheetFactory = $datasheetFactory;
        $this->formFactory = $formFactory;
    }

    /** @Route("forms", name="forms") */
    public function formsAction()
    {
        $book = new Book();

        $bookForm = $this->formFactory
            ->getFor($book)
            ->setUrl('aaa');

        return $this->render('examples/examples.forms.html.twig', [
            'bookForm' => $bookForm,
        ]);
    }

    /** @Route("datasheets", name="datasheets") */
    public function datasheetsAction()
    {
        /**
         *
         * qb showField('company.name') - tries to filter
         * addFieldHandler($item['company___name'])
         * $this->disableFilters
         * summary
         * field options
         * text field
         * show fields array/qb
         * remove fields array/qb
         *
         */


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
        $arrayDatasheet = new Datasheet(function ($limit, $offset) use ($data) {
            return $data;
        });
        $arrayDatasheet
            ->setItemsPerPage(5)
            ->setItemsTotal(700)
            ->removeFields('id')
;
        /** Query builder datasheet */

        $queryBuilder = $this->entityManager
            ->getRepository('App:Book')
            ->createQueryBuilder('b');

        $queryBuilderDatasheet = (new Datasheet($queryBuilder))
//            ->disableFilters(true)
            ->addSummary([
                'pages' => 778,
                'price' => '91`368,99',
            ])
//            ->setField('author.name', 'Alias')
//            ->addFieldHandler('title', function ($item) {
//                return strtoupper($item['author.name']);
//            })
//            ->removeFields('publishedAt');
        ;


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
            ->setParameter('date', '2020-01-01 00:00:00');

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
