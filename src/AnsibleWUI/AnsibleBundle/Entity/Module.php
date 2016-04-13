<?php

namespace AnsibleWUI\AnsibleBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="answui_modules")
 */
class Module
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
    protected $action;
    /**
     * @ORM\Column(type="string", length=250)
     */
    protected $description;
    /**
     * @ORM\Column(type="json_array")
     */
    protected $snippets;

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
     * @return Module
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
     * Set action
     *
     * @param string $action
     *
     * @return Module
     */
    public function setAction($action)
    {
        $this->action = $action;

        return $this;
    }

    /**
     * Get action
     *
     * @return string
     */
    public function getAction()
    {
        return $this->action;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return Module
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
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
