<?php

namespace Hooloovoo\Config;

use Hooloovoo\Config\Exception\KeyNotASectionException;
use Hooloovoo\Config\Exception\KeyNotFoundException;

/**
 * Class Section
 */
class Section implements SectionInterface
{
    /** @var array */
    protected $data = [];

    /** @var string */
    protected $appRoot;

    /**
     * Section constructor.
     *
     * @param array $data
     * @param string $appRoot
     */
    public function __construct(array $data, string $appRoot)
    {
        $this->data = $data;
        $this->appRoot = $appRoot;
    }

    /**
     * @param string $key
     * @param $value
     */
    public function setValue(string $key, $value)
    {
        $this->data[$key] = $value;
    }

    /**
     * @param string $key
     * @return string
     */
    public function getDirectory(string $key) : string
    {
        return $this->appRoot . '/' . $this->getValue($key);
    }

    /**
     * @return string
     */
    public function getAppRoot() : string
    {
        return $this->appRoot;
    }

    /**
     * @param string $key
     * @return mixed
     */
    public function getValue(string $key)
    {
        if (!$this->exists($key)) {
            throw new KeyNotFoundException($key);
        }

        return $this->data[$key];
    }

    /**
     * @param string $key
     * @return SectionInterface
     */
    public function getSection(string $key) : SectionInterface
    {
        $sectionData = $this->getValue($key);

        if (!$this->isSubSection($key)) {
            throw new KeyNotASectionException($key);
        }

        return new self($sectionData, $this->appRoot);
    }

    /**
     * @return SectionInterface[]
     */
    public function getSubSections() : array
    {
        $subSections = [];
        foreach ($this->data as $key => $value) {
            if ($this->isSubSection($key)) {;
                $subSections[$key] = $this->getSection($key);
            }
        }

        return $subSections;
    }

    /**
     * @return array
     */
    public function getData() : array
    {
        return $this->data;
    }

    /**
     * @param string $key
     * @return bool
     */
    public function exists(string $key) : bool
    {
        return array_key_exists($key, $this->data);
    }

    /**
     * @param string $key
     * @return bool
     */
    public function isSubSection(string $key) : bool
    {
        return $this->exists($key) && is_array($this->data[$key]);
    }
}