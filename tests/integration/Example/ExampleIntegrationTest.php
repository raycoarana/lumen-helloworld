<?php

namespace Example;

use Common\IntegrationTestBase;

class ExampleIntegrationTest extends IntegrationTestBase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testExample()
    {
        $this->get('/');

        $this->assertEquals(
            $this->app->version(),
            $this->response->getContent()
        );
    }
}
