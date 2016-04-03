<?php

namespace AnsibleWUI\AnsibleBundle\Entity;

use AnsibleWUI\ProjectBundle\Entity\ProjectHostUser;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="answui_playbooks_hosts_users")
 */
class PlaybookHostUser
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;
    /**
     * @ORM\ManyToOne(
     *     targetEntity="Playbook",
     *     inversedBy="playbooks_hosts_users"
     * )
     **/
    protected $playbook;
    /**
     * @ORM\ManyToOne(
     *     targetEntity="\AnsibleWUI\ProjectBundle\Entity\ProjectHostUser",
     *     inversedBy="playbooks"
     * )
     **/
    protected $host_user;


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
     * Set playbook
     *
     * @param Playbook $playbook
     *
     * @return PlaybookHostUser
     */
    public function setPlaybook(Playbook $playbook = null)
    {
        $this->playbook = $playbook;

        return $this;
    }

    /**
     * Get playbook
     *
     * @return Playbook
     */
    public function getPlaybook()
    {
        return $this->playbook;
    }

    /**
     * Set hostUser
     *
     * @param ProjectHostUser $hostUser
     *
     * @return PlaybookHostUser
     */
    public function setHostUser(ProjectHostUser $hostUser = null)
    {
        $this->host_user = $hostUser;

        return $this;
    }

    /**
     * Get hostUser
     *
     * @return ProjectHostUser
     */
    public function getHostUser()
    {
        return $this->host_user;
    }
}
