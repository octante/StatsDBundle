<?php

namespace Octante\StatsDBundle;

use Octante\StatsDBundle\DependencyInjection\OctanteStatsDBundleExtension;
use Symfony\Component\HttpKernel\Bundle\Bundle;

class OctanteStatsDBundle extends Bundle
{
    public function getContainerExtension()
    {
        return new OctanteStatsDBundleExtension();
    }
}
