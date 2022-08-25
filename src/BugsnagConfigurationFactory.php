<?php

/*
 * This file is part of the Catch-e Laminas Bugsnag package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace CatchE\Laminas\Bugsnag;

use Bugsnag\Configuration as BugsnagConfiguration;
use Laminas\ServiceManager\Factory\FactoryInterface;
use Psr\Container\ContainerInterface;

use function is_null;

class BugsnagConfigurationFactory implements FactoryInterface
{
    /**
     * __invoke
     *
     * @param  string $requestedName
     * @param  ?array<mixed> $options
     * @return BugsnagConfiguration
     */
    public function __invoke(ContainerInterface $container, $requestedName, ?array $options = null)
    {
        $config               = (array) $container->get('Config');
        $laminasBugsnagConfig = (array) ($config['laminas-bugsnag'] ?? []);

        $bugsnagConfiguration = new BugsnagConfiguration((string) ($laminasBugsnagConfig['apiKey'] ?? ''));
        $bugsnagConfiguration->setReleaseStage((string) ($laminasBugsnagConfig['releaseStage'] ?? 'development'));
        if (! (bool) ($laminasBugsnagConfig['enabled'] ?? false)) {
            $bugsnagConfiguration->setNotifyReleaseStages(null);
        } else {
            $bugsnagConfiguration->setNotifyReleaseStages($laminasBugsnagConfig['notifyReleaseStages'] ?? ['development']);
        }
        $bugsnagConfiguration->setSendCode((bool) ($laminasBugsnagConfig['sendCode'] ?? true));
        $bugsnagConfiguration->setAppVersion((string) ($laminasBugsnagConfig['appVersion'] ?? '1.0.0'));
        $bugsnagConfiguration->setAppType((string) ($laminasBugsnagConfig['appType'] ?? 'laminas'));
        $bugsnagConfiguration->setMemoryLimitIncrease((int) ($laminasBugsnagConfig['memoryLimitIncrease'] ?? 5242880));
        $bugsnagConfiguration->setDiscardClasses((array) ($laminasBugsnagConfig['discardClasses'] ?? []));
        $bugsnagConfiguration->setRedactedKeys((array) ($laminasBugsnagConfig['redactedKeys'] ?? []));
        if (! is_null($laminasBugsnagConfig['hostname'])) {
            $bugsnagConfiguration->setHostname($laminasBugsnagConfig['hostname']);
        }
        if (! is_null($laminasBugsnagConfig['projectRoot'])) {
            $bugsnagConfiguration->setProjectRoot($laminasBugsnagConfig['projectRoot']);
        }

        return $bugsnagConfiguration;
    }
}
