<?php

namespace DigiTouch\RocketFuel\Model\Service;

/**
 * Interface FilterInterface
 *
 * @package DigiTouch\RocketFuel\Model\Service
 */
interface FilterInterface
{
    /**
     * @return string
     */
    public function getName();

    /**
     * @return string
     */
    public function getValue();
}
