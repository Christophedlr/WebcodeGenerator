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
    public const NOVISIBILITY = 0x01;
    public const ABSTRACTVISIBILITY = 0x02;
    public const FINALVISIBILITY = 0x04;

    private $className;
    private $visibility;

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

    final public function setVisbility(int $visibility): self
    {
        switch ($visibility) {
            case self::ABSTRACTVISIBILITY:
                $this->visibility = 'abstract ';
                break;

            case self::FINALVISIBILITY:
                $this->visibility = 'final ';
                break;

            case self::NOVISIBILITY:
                $this->visibility = '';
        }

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

        $classTemplate = require __DIR__ . '/../resources/class.php';

        $generate .= sprintf($this->visibility . $classTemplate['template'], $this->className);

        return $generate;
    }
}
