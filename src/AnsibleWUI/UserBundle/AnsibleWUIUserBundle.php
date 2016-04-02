<?php

namespace AnsibleWUI\UserBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class AnsibleWUIUserBundle extends Bundle
{
    public function getParent()
    {
        return 'FOSUserBundle';
    }
}
