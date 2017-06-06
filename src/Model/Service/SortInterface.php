<?php

namespace DigiTouch\RocketFuel\Model\Service;

/**
 * Interface SortInterface
 *
 * @package DigiTouch\RocketFuel\Model\Service
 */
interface SortInterface
{
    /**
     * @return string
     */
    public function getName();

    /**
     * @return bool
     */
    public function sortAscending();
}
