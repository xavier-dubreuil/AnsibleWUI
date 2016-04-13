<?php

namespace AnsibleWUI\ProjectBundle\Manager;

use Doctrine\ORM\EntityManager;

class ProjectManager
{
    private $entityManager;

    public function __construct(EntityManager $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function getRepository()
    {
        return $this->entityManager->getRepository('AnsibleWUIProjectBundle:Project');
    }

    public function find($id)
    {
        return $this->getRepository()->find($id);
    }
}