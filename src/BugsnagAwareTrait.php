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

/**
 * A trait for objects that require bugsnag client access.
 */
trait BugsnagAwareTrait
{
    /** @var BugsnagClient */
    protected $bugsnagClient;

    /**
     * Set the bugsnag client instance.
     */
    public function setBugsnagClient(BugsnagClient $bugsnagClient)
    {
        $this->bugsnagClient = $bugsnagClient;
    }

    /**
     * Retrieve the bugsnag client.
     *
     * @return BugsnagClient
     */
    public function getBugsnagClient()
    {
        return $this->bugsnagClient;
    }
}
