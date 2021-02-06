<?php
// phpcs:ignoreFile

/**
 * This is project's console commands configuration for Robo task runner.
 *
 * @see http://robo.li/
 */
class RoboFile extends \Robo\Tasks
{
    public function test()
    {
        return $this->taskPHPUnit()
            ->configFile('phpunit.xml')
            ->run();
    }

    public function checkPhpCs()
    {
        return $this->taskExec("./vendor/bin/phpcs")
            ->option("standard", "PSR12", "=")
            ->option("ignore", ".vendor", "=")
            ->option("colors")
            ->arg("./")
            ->run();
    }

    public function checkPhpCsFixer()
    {
        return $this->taskExec("./vendor/bin/phpcbf")
            ->option("standard", "PSR12", "=")
            ->option("ignore", ".vendor", "=")
            ->option("colors")
            ->arg("./")
            ->run();
    }

    public function verify()
    {
        return $this->collectionBuilder()
            ->addCode(array($this, 'test'))
            ->addCode(array($this, 'checkPhpCs'))
            ->run();
    }
}
