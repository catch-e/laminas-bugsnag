<?php

/*
 * This file is part of the Catch-e Laminas Bugsnag package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

use Bugsnag\Client as BugsnagClient;
use Bugsnag\Configuration as BugsnagConfiguration;
use CatchE\Laminas\Bugsnag\BugsnagClientFactory;
use CatchE\Laminas\Bugsnag\BugsnagConfigurationFactory;
use CatchE\Laminas\Bugsnag\BugsnagInitializer;

return [
    'controllers'     => [
        'initializers' => [
            BugsnagInitializer::class,
        ],
    ],
    'service_manager' => [
        'factories'    => [
            BugsnagClient::class        => BugsnagClientFactory::class,
            BugsnagConfiguration::class => BugsnagConfigurationFactory::class,
        ],
        'initializers' => [
            BugsnagInitializer::class,
        ],
        'shared'       => [
            BugsnagClient::class        => true,
            BugsnagConfiguration::class => true,
        ],
    ],
];
