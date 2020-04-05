<?php

namespace App\Datasheet;

use A2Global\CRMBundle\Datasheet\ArrayDatasheet;
use Doctrine\ORM\EntityManagerInterface;

class RemixesDatasheet extends ArrayDatasheet
{
    protected $itemsPerPage = 10;

    protected $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function build(int $startFrom = 0, int $limit = 0, $sort = [], $filters = [])
    {
        $items = [];

        foreach ($this->entityManager->getRepository('App:Remix')->findAll() as $remix) {
            $item = [
                'name' => $remix->getName(),
                'genre' => $remix->getLength(),
            ];
            $items[] = $item;
        }

        $this->setItems($items);
    }
}