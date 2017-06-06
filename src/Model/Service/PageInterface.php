<?php

namespace DigiTouch\RocketFuel\Model\Service;

/**
 * Interface PageInterface
 *
 * @package DigiTouch\RocketFuel\Model\Service
 */
interface PageInterface
{
    /**
     * @return int
     */
    public function getPage();

    /**
     * @return int
     */
    public function getSize();
}
