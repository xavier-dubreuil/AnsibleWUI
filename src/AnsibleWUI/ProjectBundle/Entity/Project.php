<?php

namespace AnsibleWUI\ProjectBundle\Entity;

use AnsibleWUI\AnsibleBundle\Entity\Playbook;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="answui_projects")
 */
class Project
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;
    /**
     * @ORM\Column(type="string", length=50)
     */
    protected $name;
    /**
     * @ORM\Column(type="string", length=50)
     */
    protected $slug;
    /**
     * @ORM\OneToMany(
     *     targetEntity="\AnsibleWUI\AnsibleBundle\Entity\Playbook",
     *     mappedBy="project"
     * )
     **/
    protected $playbooks;

    /**
     * Project constructor.
     */
    public function __construct()
    {
        $this->hosts_users = new ArrayCollection();
        $this->playbooks = new ArrayCollection();
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
     * @return Project
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
     * Set slug
     *
     * @param string $slug
     *
     * @return Project
     */
    public function setSlug($slug)
    {
        $this->slug = $slug;

        return $this;
    }

    /**
     * Get slug
     *
     * @return string
     */
    public function getSlug()
    {
        return $this->slug;
    }

    /**
     * Add playbook
     *
     * @param Playbook $playbook
     *
     * @return Project
     */
    public function addPlaybook(Playbook $playbook)
    {
        $this->playbooks[] = $playbook;

        return $this;
    }

    /**
     * Remove playbook
     *
     * @param Playbook $playbook
     */
    public function removePlaybook(Playbook $playbook)
    {
        $this->playbooks->removeElement($playbook);
    }

    /**
     * Get playbooks
     *
     * @return Collection
     */
    public function getPlaybooks()
    {
        return $this->playbooks;
    }
}
