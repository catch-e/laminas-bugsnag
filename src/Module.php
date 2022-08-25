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
use Exception;
use Laminas\ModuleManager\Feature\ConfigProviderInterface;
use Laminas\Mvc\Application;
use Laminas\Mvc\ApplicationInterface;
use Laminas\Mvc\MvcEvent;
use Throwable;
use Traversable;

use function is_null;

class Module implements ConfigProviderInterface
{
    /**
     * @return void
     */
    public function onBootstrap(MvcEvent $e)
    {
        /**
         * @var ApplicationInterface $application
         */
        $application  = $e->getTarget();
        $eventManager = $application->getEventManager();
        $services     = $application->getServiceManager();

        /**
         * @var BugsnagClient $bugsnag
         */
        $bugsnag       = $services->get(BugsnagClient::class);
        $sharedManager = $eventManager->getSharedManager();
        if (! is_null($sharedManager)) {
            $sharedManager->attach(Application::class, 'dispatch.error', function (MvcEvent $e) use ($bugsnag) {
                if ($e->getParam('exception')) {
                    /**
                     * @var Exception $exceptionParam
                     */
                    $exceptionParam = $e->getParam('exception');
                    if ($exceptionParam instanceof Throwable) {
                        $bugsnag->notifyException($exceptionParam);
                    }

                    return;
                }
            });
        }
    }

    /**
     * Returns configuration to merge with application configuration
     *
     * @return array<mixed>|Traversable
     */
    public function getConfig()
    {
        return include __DIR__ . '/../config/module.config.php';
    }
}
