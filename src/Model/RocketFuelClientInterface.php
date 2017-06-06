<?php

namespace DigiTouch\RocketFuel\Model;

/**
 * Interface RocketFuelClientInterface
 *
 * @package DigiTouch\RocketFuel\Model
 */
interface RocketFuelClientInterface
{
    /**
     * @param string $apiEndpoint
     * @param string $authenticationToken
     *
     * @return RocketFuelClientInterface
     */
    public static function getInstance($apiEndpoint, $authenticationToken);

    /**
     * @param string $serviceFQCN the fully qualified class name of the required class (interface)
     *
     * @return mixed
     *
     * @throws \LogicException
     */
    public function get($serviceFQCN);
}
