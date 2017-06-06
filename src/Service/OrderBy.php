<?php

namespace DigiTouch\RocketFuel\Service;

use DigiTouch\RocketFuel\Model\Service\SortInterface;

/**
 * Class SortBy
 *
 * @package DigiTouch\RocketFuel\Service
 */
class OrderBy implements SortInterface
{
    /** @var string */
    private $name;

    /** @var bool */
    private $ascending;

    /**
     * SortBy constructor.
     *
     * @param string $name
     * @param bool   $ascending
     */
    public function __construct($name, $ascending)
    {
        $this->name = $name;
        $this->ascending = (bool) $ascending;
    }

    /**
     * {@inheritdoc}
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * {@inheritdoc}
     */
    public function sortAscending()
    {
        return $this->ascending;
    }
}
