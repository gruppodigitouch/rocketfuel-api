<?php

namespace DigiTouch\RocketFuel\Service;

use DigiTouch\RocketFuel\Model\BaseRequestBuilderInterface;

/**
 * Class AbstractService
 *
 * @package DigiTouch\RocketFuel\Service
 */
abstract class AbstractService
{
    /** @var BaseRequestBuilderInterface */
    protected $requestBuilder;

    /**
     * AbstractService constructor.
     *
     * @param BaseRequestBuilderInterface $requestBuilder
     */
    public function __construct(BaseRequestBuilderInterface $requestBuilder)
    {
        $this->requestBuilder = $requestBuilder;}
}
