<?php
namespace Hooloovoo\Config;

/**
 * Interface ConfigInterface
 */
interface ConfigInterface
{
    /**
     * @return string
     */
    public function getAppRoot() : string ;

    /**
     * @param $key
     * @return string
     */
    public function getDirectory($key) : string ;

    /**
     * @param string $key
     * @param $value
     */
    public function setValue(string $key, $value) ;

    /**
     * @param string $key
     * @return mixed
     */
    public function getValue(string $key) ;

    /**
     * @param string $key
     * @return SectionInterface
     */
    public function getSection(string $key) : SectionInterface ;

}