<?php
namespace Hooloovoo\Config\Parser;

/**
 * Class JsonFile
 */
class JsonFile implements ParserInterface
{
    /** @var string */
    private $filePath;

    /**
     * JsonFile constructor.
     *
     * @param string $filePath
     */
    public function __construct(string $filePath)
    {
        $this->filePath = $filePath;
    }

    /**
     * @return array
     */
    public function getData(): array
    {
        $rawData = file_get_contents($this->filePath);
        return json_decode($rawData, true);
    }
}