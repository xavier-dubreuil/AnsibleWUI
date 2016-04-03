<?php

namespace AnsibleWUI\HostBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="answui_hosts_users")
 */
class HostUser
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;
    /**
     * @ORM\ManyToOne(targetEntity="Host",inversedBy="users")
     **/
    protected $host;
    /**
     * @ORM\Column(type="string", length=50)
     */
    protected $user;
    /**
     * @ORM\Column(type="text")
     */
    protected $private_key;
    /**
     * @ORM\Column(type="text")
     */
    protected $ublic_key;

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
     * Set user
     *
     * @param string $user
     *
     * @return HostUser
     */
    public function setUser($user)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return string
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Set privateKey
     *
     * @param string $privateKey
     *
     * @return HostUser
     */
    public function setPrivateKey($privateKey)
    {
        $this->private_key = $privateKey;

        return $this;
    }

    /**
     * Get privateKey
     *
     * @return string
     */
    public function getPrivateKey()
    {
        return $this->private_key;
    }

    /**
     * Set ublicKey
     *
     * @param string $ublicKey
     *
     * @return HostUser
     */
    public function setUblicKey($ublicKey)
    {
        $this->ublic_key = $ublicKey;

        return $this;
    }

    /**
     * Get ublicKey
     *
     * @return string
     */
    public function getUblicKey()
    {
        return $this->ublic_key;
    }

    /**
     * Set host
     *
     * @param Host $host
     *
     * @return HostUser
     */
    public function setHost(Host $host = null)
    {
        $this->host = $host;

        return $this;
    }

    /**
     * Get host
     *
     * @return Host
     */
    public function getHost()
    {
        return $this->host;
    }
}
