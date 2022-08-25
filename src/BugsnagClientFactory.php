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
use Bugsnag\Configuration as BugsnagConfiguration;
use Bugsnag\Handler as BugsnagHandler;
use Laminas\ServiceManager\Factory\FactoryInterface;
use Psr\Container\ContainerInterface;

class BugsnagClientFactory implements FactoryInterface
{
    /**
     * __invoke
     *
     * @param  string $requestedName
     * @param  ?array<mixed> $options
     * @return BugsnagClient
     */
    public function __invoke(ContainerInterface $container, $requestedName, ?array $options = null)
    {
        /**
         * @var BugsnagConfiguration $configuration
         */
        $configuration = $container->get(BugsnagConfiguration::class);
        $client        = new BugsnagClient($configuration);
        $client->registerDefaultCallbacks();
        BugsnagHandler::register($client);

        return $client;
    }
}
