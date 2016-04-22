<?php

namespace Octante\StatsDBundle;

use Octante\StatsDBundle\DependencyInjection\StatsDBundleExtension;
use Symfony\Component\HttpKernel\Bundle\Bundle;

class StatsDBundle extends Bundle
{
    public function getContainerExtension()
    {
        return new StatsDBundleExtension();
    }
}
