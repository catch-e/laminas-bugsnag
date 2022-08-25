<?php

/*
 * This file is part of the Catch-e Laminas Bugsnag package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace CatchE\Laminas\Bugsnag;

use Bugsnag\Client as BugsnagClient;
use Laminas\ServiceManager\Initializer\InitializerInterface;
use Psr\Container\ContainerInterface;

class BugsnagInitializer implements InitializerInterface
{
    public function __invoke(ContainerInterface $container, $instance)
    {
        if (! $instance instanceof BugsnagAwareInterface) {
            return;
        }
        $instance->setBugsnagClient($container->get(BugsnagClient::class));
    }
}
