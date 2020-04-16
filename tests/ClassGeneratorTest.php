<?php

use Christophedlr\WebcodeGenerator\PHPGenerator;
use PHPUnit\Framework\TestCase;

class ClassGeneratorTest extends TestCase
{
    /**
     * @var PHPGenerator
     */
    private $phpGenerator;

    protected function setUp()
    {
        $this->phpGenerator = new PHPGenerator();
    }

    public function testClassName()
    {
        $result = $this->phpGenerator->setClassName('TestClassName')->toString();

        $this->assertEquals(file_get_contents(__DIR__ . '/tests_files/TestClassName.php'), $result);
    }

    public function testAbstractClassName()
    {
        $result = $this->phpGenerator
            ->setClassName('TestAbstractClassName')
            ->setVisbility($this->phpGenerator::ABSTRACTVISIBILITY)
            ->toString();

        $this->assertEquals(file_get_contents(__DIR__ . '/tests_files/TestAbstractClassName.php'), $result);
    }

    public function testFinalClassName()
    {
        $result = $this->phpGenerator
            ->setClassName('TestFinalClassName')
            ->setVisbility($this->phpGenerator::FINALVISIBILITY)
            ->toString();

        $this->assertEquals(file_get_contents(__DIR__ . '/tests_files/TestFinalClassName.php'), $result);
    }
}
