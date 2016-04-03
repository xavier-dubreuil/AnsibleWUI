<?php

namespace AnsibleWUI\ProjectBundle\Entity;

use AnsibleWUI\HostBundle\Entity\HostUser;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="answui_projects_hosts_users")
 */
class ProjectHostUser
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;
    /**
     * @ORM\ManyToOne(
     *     targetEntity="Project",
     *     inversedBy="hosts_users"
     * )
     **/
    protected $project;
    /**
     * @ORM\ManyToOne(
     *     targetEntity="\AnsibleWUI\HostBundle\Entity\HostUser",
     *     inversedBy="projects"
     * )
     **/
    protected $user;
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
     * @return ProjectHostUser
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
     * @return ProjectHostUser
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

    /**
     * Set user
     *
     * @param HostUser $user
     *
     * @return ProjectHostUser
     */
    public function setUser(HostUser $user = null)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return HostUser
     */
    public function getUser()
    {
        return $this->user;
    }
}
