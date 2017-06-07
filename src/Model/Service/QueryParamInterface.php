<?php

namespace DigiTouch\RocketFuel\Model\Service;

/**
 * Interface QueryParamInterface
 *
 * @package DigiTouch\RocketFuel\Model\Service
 */
interface QueryParamInterface
{
    /**
     * @return string
     */
    public function getName();

    /**
     * @return mixed
     */
    public function getValue();

    /**
     * @return string
     */
    public function __toString();
}
