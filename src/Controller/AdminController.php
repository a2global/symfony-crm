<?php

namespace App\Controller;

use A2Global\CRMBundle\Builder\FormBuilder;
use App\Datasheet\RemixesDatasheet;
use App\Datasheet\SongsDatasheet;
use App\Entity\Singer;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

/** @Route("/admin/", name="admin_") */
class AdminController extends AbstractController
{
    private $songsDatasheet;

    private $remixesDatasheet;

    private $formBuilder;

    private $entityManager;

    public function __construct(
        EntityManagerInterface $entityManager,
        FormBuilder $formBuilder,
        SongsDatasheet $songsDatasheet,
        RemixesDatasheet $remixesDatasheet
    )
    {
        $this->songsDatasheet = $songsDatasheet;
        $this->remixesDatasheet = $remixesDatasheet;
        $this->formBuilder = $formBuilder;
        $this->entityManager = $entityManager;
    }

    /** @Route("complex-page/{singer?}", name="complex_page") */
    public function complexPage(Request $request, Singer $singer = null)
    {
        if (!$singer && $request->query->get('objectId')) {
            $singer = $this->entityManager
                ->getRepository('App:Singer')
                ->find($request->query->get('objectId'));
        }
        $singerForm = $this->formBuilder
            ->buildFor('Singer', $singer, $this->generateUrl('admin_complex_page'));

        return $this->render('admin/complex_page.html.twig', [
            'singerForm' => $singerForm,
            'songsDatasheet' => $this->songsDatasheet,
            'remixesDatasheet' => $this->remixesDatasheet,
        ]);
    }
}
