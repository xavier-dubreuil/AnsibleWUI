<?php

namespace AnsibleWUI\UserBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

/**
 * Class AnsibleWUIUserBundle
 *
 * @package AnsibleWUI\UserBundle
 */
class AnsibleWUIUserBundle extends Bundle
{
    /**
     * @return string
     */
    public function getParent()
    {
        return 'FOSUserBundle';
    }
}
