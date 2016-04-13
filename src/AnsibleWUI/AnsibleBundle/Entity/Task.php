<?php

namespace AnsibleWUI\AnsibleBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="answui_playbooks_tasks")
 */
class Task
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;
    /**
     * @ORM\ManyToOne(
     *     targetEntity="PlaybookHostUser",
     *     inversedBy="tasks"
     * )
     **/
    protected $playbook_host_user;
    /**
     * @ORM\Column(type="string", length=50)
     */
    protected $type;
    /**
     * @ORM\Column(type="json_array")
     */
    protected $snippets;


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
     * Set type
     *
     * @param string $type
     *
     * @return Task
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set playbookHostUser
     *
     * @param PlaybookHostUser $playbookHostUser
     *
     * @return Task
     */
    public function setPlaybookHostUser(PlaybookHostUser $playbookHostUser = null)
    {
        $this->playbook_host_user = $playbookHostUser;

        return $this;
    }

    /**
     * Get playbookHostUser
     *
     * @return PlaybookHostUser
     */
    public function getPlaybookHostUser()
    {
        return $this->playbook_host_user;
    }

    /**
     * Set snippets
     *
     * @param array $snippets
     *
     * @return Module
     */
    public function setSnippets($snippets)
    {
        $this->snippets = $snippets;

        return $this;
    }

    /**
     * Get snippets
     *
     * @return array
     */
    public function getSnippets()
    {
        return $this->snippets;
    }
}
