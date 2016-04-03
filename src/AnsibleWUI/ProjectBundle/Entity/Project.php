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
     * @ORM\ManyToOne(targetEntity="Client",inversedBy="projects")
     **/
    protected $client;
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
     *     targetEntity="ProjectHostUser",
     *     mappedBy="project"
     * )
     **/
    protected $hosts_users;
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
     * Set client
     *
     * @param Client $client
     *
     * @return Project
     */
    public function setClient(Client $client = null)
    {
        $this->client = $client;

        return $this;
    }

    /**
     * Get client
     *
     * @return Client
     */
    public function getClient()
    {
        return $this->client;
    }

    /**
     * Add hostUser
     *
     * @param ProjectHostUser $hostUser
     *
     * @return Project
     */
    public function addHostsUsers(ProjectHostUser $hostUser)
    {
        $this->hosts_users[] = $hostUser;

        return $this;
    }

    /**
     * Remove hostUser
     *
     * @param ProjectHostUser $hostUser
     */
    public function removeHostUser(ProjectHostUser $hostUser)
    {
        $this->hosts_users->removeElement($hostUser);
    }

    /**
     * Get hostUser
     *
     * @return Collection
     */
    public function getHostUser()
    {
        return $this->hosts_users;
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
