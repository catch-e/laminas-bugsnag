<?php

declare(strict_types=1);

return [
    'laminas-bugsnag' => [
        /**
         * Enabled
         *
         * Is Bugsnag enabled?
         *
         * Default: false
         */
        'enabled' => false,

        /**
         * ApiKey
         *
         * The ApiKey you can find on your Bugsnag dashboard
         */
        'apiKey' => 'YOUR-API-KEY-HERE',

        /**
         * releaseStage
         *
         * The ReleaseStage that the error occurred in
         *
         * Default: development
         */
        'releaseStage' => 'development',

        /**
         * notifyReleaseStages
         *
         * Which ReleaseStages should send notifications to Bugsnag?
         *
         * Default: ['development', 'production']
         */
        'notifyReleaseStages' => ['development', 'production'],

        /**
         * sendCode
         *
         * Set if we should we send a small snippet of the code that crashed.
         * This can help you diagnose even faster from within your dashboard.
         *
         * Default: true
         */
        'sendCode' => true,

        /**
         * appVersion
         *
         * The version of the application that will be sent to BugSnag,
         * useful when fixing errors so Bugsnag reports errors if they appear
         * in a new version of the app.
         *
         * Default: 1.0.0
         */
        'appVersion' => '1.0.0',

        /**
         * appType
         *
         * Set the type of application executing the code.
         *
         * This is usually used to represent if you are running plain PHP code
         * "php", via a framework, eg "laravel", or executing through delayed
         * worker code, eg "resque".
         *
         * Default: laminas
         */
        'appType' => 'laminas',

        /**
         * memoryLimitIncrease
         *
         * The amount to increase the memory_limit to handle an OOM.
         *
         * The default is 5MiB and can be disabled by setting it to 'null'
         */
        'memoryLimitIncrease' => 5242880,

        /**
         * discardClasses
         *
         * An array of classes that should not be sent to Bugsnag.
         * This can contain both fully qualified class names and regular expressions.
         */
        'discardClasses' => [],

        /**
         * redactedKeys
         *
         * An array of metadata keys that should be redacted.
         */
        'redactedKeys' => [
            'password',
            'cookie',
            'authorization',
            'php-auth-user',
            'php-auth-pw',
            'php-auth-digest',
        ],

        /**
         * autoCaptureSessions
         *
         * Set session tracking state.
         */
        'autoCaptureSessions' => false,

        /**
         * hostname
         *
         * Set the hostname. If null it will use the default php_uname('n').
         */
        'hostname' => null,

        /**
         * projectRoot
         *
         * Bugsnag marks stacktrace lines as in-project if they come from files inside
         * your "project root". This can be set by defining projectRoot.
         */
        'projectRoot' => null,
    ],
];
