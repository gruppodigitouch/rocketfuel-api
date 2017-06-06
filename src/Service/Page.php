<?php

namespace DigiTouch\RocketFuel\Service;

use DigiTouch\RocketFuel\Model\Service\PageInterface;

/**
 * Class Page
 *
 * @package DigiTouch\RocketFuel\Service
 */
class Page implements PageInterface
{
    /** @var int */
    private $page;

    /** @var int */
    private $size;

    /**
     * Page constructor.
     *
     * @param int $page
     * @param int $size
     */
    public function __construct($page, $size)
    {
        $this->page = $page;
        $this->size = $size;
    }

    /**
     * {@inheritdoc}
     */
    public function getPage()
    {
        return $this->page;
    }

    /**
     * {@inheritdoc}
     */
    public function getSize()
    {
        return $this->size;
    }
}
