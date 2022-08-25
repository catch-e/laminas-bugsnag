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

interface BugsnagAwareInterface
{
    /**
     * Inject an Bugsnag client instance
     *
     * @return void
     */
    public function setBugsnagClient(BugsnagClient $bugsnagClient);
}
