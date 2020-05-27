<?php

namespace App\Controller;

use A2Global\CRMBundle\Component\Datasheet\FieldType\TypeMoney;
use A2Global\CRMBundle\Datasheet\Datasheet;
use A2Global\CRMBundle\Factory\DatasheetFactory;
use A2Global\CRMBundle\Factory\FormFactory;
use A2Global\CRMBundle\Provider\EntityInfoProvider;
use App\Entity\Book;
use App\Repository\BookRepository;
use DateTime;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\Query\Expr\Join;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

/** @Route("/examples/", name="examples_") */
class ExampleController extends AbstractController
{
    private $entityManager;

    private $datasheetFactory;

    private $formFactory;

    private $entityInfoProvider;

    public function __construct(
        EntityManagerInterface $entityManager,
        DatasheetFactory $datasheetFactory,
        FormFactory $formFactory,
        EntityInfoProvider $entityInfoProvider
    )
    {
        $this->entityManager = $entityManager;
        $this->datasheetFactory = $datasheetFactory;
        $this->formFactory = $formFactory;
        $this->entityInfoProvider = $entityInfoProvider;
    }

    /** @Route("forms", name="forms") */
    public function formsAction()
    {

        $book = $this->entityManager->getRepository('App:Book')->find(1);

        $bookForm = $this->formFactory
            ->getFor($book)
            ->setUrl($this->generateUrl('examples_forms_handle'));

        return $this->render('examples/examples.forms.html.twig', [
            'bookForm' => $bookForm,
        ]);
    }

    /** @Route("forms/handle", name="forms_handle") */
    public function formHandleAction(Request $request)
    {
        $book = $this->entityManager->getRepository('App:Book')->find(1);
        $entity = $this->entityInfoProvider->getEntity($book);
        $data = $request->request->get('data');

        foreach ($data as $field => $value) {
            $field = $entity->getField($field);
            $field->setValueToObject($value, $book);
        }

        $this->entityManager->flush();

        return $this->redirectToRoute('examples_forms');
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

        $data = $this->getSampleArray();
        $arrayDatasheet = new Datasheet($data);
        $arrayDatasheet
            ->setItemsPerPage(5)
            ->setField('price', ['type' => TypeMoney::class,]);


        /** Query builder datasheet */

        $queryBuilder = $this->entityManager
            ->getRepository('App:Book')
            ->createQueryBuilder('b');

        $queryBuilderDatasheet = (new Datasheet($queryBuilder))
            ->disableFilters()
//            ->addSummary([
//                'pages' => 778,
//                'price' => '91`368,99',
//            ])
//            ->setField('author.name', 'Alias')
//            ->addFieldHandler('title', function ($item) {
//                return strtoupper($item['author.name']);
//            })
//            ->removeFields('publishedAt');
        ;


        /** Complex query builder datasheet */


        /** @var BookRepository $br */
        $br = $this->entityManager->getRepository('App:Book');

        $qb = $br
            ->createQueryBuilder('b')
            ->select('b.title')
            ->addSelect('b.price')
            ->addSelect('a.name')
            ->addSelect('d.street')
            ->addSelect('d.livedTill')
            ->setParameters([
                'date' => '2020-05-01',
            ])
            ->join('b.author', 'a')
            ->leftJoin(
                'a.address',
                'd',
                Join::WITH,
                'd.livedTill > :date'
            );

//
        $advancedQueryBuilderDatasheet = new Datasheet($qb);
        $advancedQueryBuilderDatasheet
//            ->disableFilters()
            ->setItemsPerPage(5)
        ;

        /** Rendering examples */

        return $this->render('examples/examples.datasheets.html.twig', [
            'arrayDatasheet' => $arrayDatasheet,
            'queryBuilderDatasheet' => $queryBuilderDatasheet,
            'advancedQueryBuilderDatasheet' => $advancedQueryBuilderDatasheet,
        ]);
    }

    protected function getSampleArray()
    {
        $dir = sprintf('%s/{*,*/*,*/*/*,*/*/*/*,*/*/*/*/*,}', $this->getParameter('kernel.project_dir'));
        $dir = sprintf('%s/{*,*/*,*/*/*}', $this->getParameter('kernel.project_dir'));
        $data = [];
        $i = 0;

        foreach (glob($dir, GLOB_BRACE) as $file) {
            if (is_dir($file)) {
                continue;
            }
            ++$i;
            $pathinfo = pathinfo($file);

            $data[] = [
                'id' => $i,
                'filename' => $pathinfo['filename'],
                'extension' => $pathinfo['extension'] ?? '',
                'size' => filesize($file),
                'price' => filesize($file),
                'updatedAt' => new Datetime(date(DATE_ATOM, filemtime($file))),
                'path' => $file,
            ];
        }

        return $data;
    }
}
