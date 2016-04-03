<?php

namespace AnsibleWUI\AnsibleBundle\Entity;

use AnsibleWUI\ProjectBundle\Entity\Project;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="answui_playbooks")
 */
class Playbook
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;
    /**
     * @ORM\ManyToOne(
     *     targetEntity="\AnsibleWUI\ProjectBundle\Entity\Project",
     *     inversedBy="playbooks"
     * )
     **/
    protected $project;
    /**
     * @ORM\Column(type="string", length=50)
     */
    protected $name;

    /**
     * Project constructor.
     */
    public function __construct()
    {
    }

    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return Playbook
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set project
     *
     * @param Project $project
     *
     * @return Playbook
     */
    public function setProject(Project $project = null)
    {
        $this->project = $project;

        return $this;
    }

    /**
     * Get project
     *
     * @return Project
     */
    public function getProject()
    {
        return $this->project;
    }
}
