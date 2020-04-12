<?php

namespace App\Controller;

use A2Global\CRMBundle\Factory\FormFactory;
use App\Entity\Book;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends AbstractController
{
    private $entityManager;

    private $formFactory;

    public function __construct(
        EntityManagerInterface $entityManager,
        FormFactory $formFactory
    )
    {
        $this->entityManager = $entityManager;
        $this->formFactory = $formFactory;
    }

    /** @Route("/", name="homepage") */
    public function index()
    {
        return $this->render('homepage.html.twig');
    }

    /** @Route("/test", name="test") */
    public function test()
    {
        $worker = $this->entityManager->getRepository('App:Worker')->find(7);
        $workerForm = $this->formFactory->getFor($worker);
        $bookForm = $this->formFactory->getFor(new Book());

        return $this->render('test.html.twig', [
            'workerForm' => $workerForm,
            'bookForm' => $bookForm,
        ]);
    }

    /** @Route("/sample/datasheet", name="datasheet") */
    public function datasheet()
    {
        return $this->render('homepage.html.twig');
    }
}
