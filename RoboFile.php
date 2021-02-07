<?php
// phpcs:ignoreFile

use Robo\Result;

/**
 * This is project's console commands configuration for Robo task runner.
 *
 * @see http://robo.li/
 */
class RoboFile extends \Robo\Tasks
{
    private $sourceSets = [
        "app/",
        "bootstrap/",
        "database/",
        "routes/",
        "tests/"
    ];

    /**
     * @return Result
     */
    public function test()
    {
        return $this->taskPHPUnit()
            ->configFile('phpunit.xml')
            ->run();
    }

    /**
     * @return Result
     */
    public function checkPhpStan()
    {
        return $this->taskExec("./vendor/bin/phpstan")
            ->arg("analyse")
            ->option("autoload-file", "_ide_helper.php", "=")
            ->option("level", "8", "=")
            ->option("configuration", "build-tools/phpstan-baseline.neon", "=")
            ->option("no-interaction")
            ->rawArg(implode(" ", $this->sourceSets))
            ->run();
    }

    /**
     * @return Result
     */
    public function checkPhpMD()
    {
        return $this->taskExec("./vendor/bin/phpmd")
            ->arg(implode(",", $this->sourceSets))
            ->arg("ansi")
            ->arg("cleancode,codesize,controversial,design,naming,unusedcode")
            ->run();
    }

    /**
     * @return Result
     */
    public function checkPhpCs()
    {
        return $this->commonPhpCsConfig($this->taskExec("./vendor/bin/phpcs"));
    }

    /**
     * @return Result
     */
    public function checkPhpCsFixer()
    {
        return $this->commonPhpCsConfig($this->taskExec("./vendor/bin/phpcbf"));
    }

    /**
     * @var \Robo\Task\Base\Exec|\Robo\Collection\CollectionBuilder $task
     *
     * @return Result
     */
    private function commonPhpCsConfig($task)
    {
        $task->option("standard", "PSR12", "=")
            ->option("ignore", ".vendor,_ide_helper.php", "=")
            ->option("colors")
            ->arg("./")
            ->run();
    }

    /**
     * @return Result|\ArrayObject
     */
    public function verify()
    {
        return $this->collectionBuilder()
            ->addCode(array($this, 'test'))
            ->addCode(array($this, 'checkPhpCs'))
            ->addCode(array($this, 'checkPhpStan'))
            ->run();
    }
}
