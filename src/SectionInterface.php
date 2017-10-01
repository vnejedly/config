<?php
namespace Hooloovoo\Config;

/**
 * Interface SectionInterface
 */
interface SectionInterface
{
    /**
     * @param string $key
     * @param $value
     */
    public function setValue(string $key, $value) ;

    /**
     * @param string $key
     * @return string
     */
    public function getDirectory(string $key) : string ;

    /**
     * @return string
     */
    public function getAppRoot() : string ;

    /**
     * @param string $key
     * @return mixed
     */
    public function getValue(string $key) ;

    /**
     * @param string $key
     * @return SectionInterface
     */
    public function getSection(string $key) : self ;

    /**
     * @return SectionInterface[]
     */
    public function getSubSections() : array ;

    /**
     * @return array
     */
    public function getData() : array ;

    /**
     * @param string $key
     * @return bool
     */
    public function exists(string $key) : bool ;

    /**
     * @param string $key
     * @return bool
     */
    public function isSubSection(string $key) : bool ;
}