<?php

namespace Christophedlr\WebcodeGenerator;

/**
 * Class PHPGenerator
 * @package Christophedlr\WebcodeGenerator
 * @author Christophe Daloz - De Los Rios <christophedlr@gmail.com>
 * @version 1.0
 * @license MIT
 */
class PHPGenerator
{
    private $className;

    /**
     * Set name of class
     *
     * @param string $className
     * @return $this
     */
    final public function setClassName(string $className): self
    {
        $this->className = $className;

        return $this;
    }

    final public function setNamespace(string $namespace): self
    {
        return $this;
    }

    public function toString()
    {
        return $this->generate();
    }

    private function generate()
    {
        $generate = '<?php' . PHP_EOL . PHP_EOL;
        $classTemplate = ['template' => 'class %s' . PHP_EOL . '{' . PHP_EOL . '}'];

        /*$generate = '<?php' . PHP_EOL . PHP_EOL;
        $generate .= 'class ' . $this->className . PHP_EOL . '{' . PHP_EOL . '}' . PHP_EOL;*/

        $classTemplate = require __DIR__ . '/../resources/class.php';

        $generate .= sprintf($classTemplate['template'], $this->className);

        return $generate;
    }
}
