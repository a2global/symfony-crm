<?php

namespace App\Controller;

use App\Datasheet\RemixesDatasheet;
use App\Datasheet\SongsDatasheet;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

/** @Route("/admin/", name="admin_") */
class AdminController extends AbstractController
{
    private $songsDatasheet;

    private $remixesDatasheet;

    public function __construct(
        SongsDatasheet $songsDatasheet,
        RemixesDatasheet $remixesDatasheet
    )
    {
        $this->songsDatasheet = $songsDatasheet;
        $this->remixesDatasheet = $remixesDatasheet;
    }

    /** @Route("complex-page", name="complex_page") */
    public function complexPage()
    {
        return $this->render('admin/complex_page.html.twig', [
            'songsDatasheet' => $this->songsDatasheet,
            'remixesDatasheet' => $this->remixesDatasheet,
        ]);
    }
}
