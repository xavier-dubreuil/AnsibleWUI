<?php

namespace AnsibleWUI\ProjectBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="answui_projects")
 */
class User
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    protected $client;

    /**
     * @ORM\Column(type="string" length=50)
     */
    protected $name;

    /**
     * @ORM\Column(type="string" length=50)
     */
    protected $slug;

    protected $hosts;

    protected $playbooks;

    public function __construct()
    {
    }
}