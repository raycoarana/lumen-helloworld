<?php

namespace Common;

use Laravel\Lumen\Testing\TestCase as BaseTestCase;

abstract class IntegrationTestBase extends BaseTestCase
{
    /**
     * Creates the application.
     *
     * @return \Laravel\Lumen\Application|\Symfony\Component\HttpKernel\HttpKernelInterface
     */
    public function createApplication()
    {
        return require __DIR__ . '/../../../bootstrap/app.php';
    }
}
