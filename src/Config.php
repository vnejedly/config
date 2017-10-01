<?php
namespace Hooloovoo\Config;

use Hooloovoo\Config\Parser\ParserInterface;

/**
 * Class Config
 */
class Config implements ConfigInterface
{
    /** @var ParserInterface */
    protected $parser;

    /** @var Section */
    protected $rootSection;

    /** @var string */
    protected $appRoot;

    /**
     * Config constructor.
     *
     * @param ParserInterface $parser
     * @param string $appRoot
     */
    public function __construct(ParserInterface $parser, string $appRoot)
    {
        $this->parser = $parser;
        $this->appRoot = $appRoot;
        $this->init();
    }

    /**
     * @return string
     */
    public function getAppRoot() : string
    {
        return $this->rootSection->getAppRoot();
    }

    /**
     * @param $key
     * @return string
     */
    public function getDirectory($key) : string
    {
        return $this->rootSection->getDirectory($key);
    }

    /**
     * @param string $key
     * @param $value
     */
    public function setValue(string $key, $value)
    {
        $this->rootSection->setValue($key, $value);
    }

    /**
     * @param string $key
     * @return mixed
     */
    public function getValue(string $key)
    {
        return $this->rootSection->getValue($key);
    }

    /**
     * @param string $key
     * @return SectionInterface
     */
    public function getSection(string $key) : SectionInterface
    {
        return $this->rootSection->getSection($key);
    }

    /**
     * Initializes root section
     */
    protected function init()
    {
        $this->rootSection = new Section($this->parser->getData(), $this->appRoot);
    }
}