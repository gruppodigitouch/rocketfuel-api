<?php

namespace DigiTouch\RocketFuel\Service\Filter;

use DigiTouch\RocketFuel\Model\Service\FilterInterface;

/**
 * Class AbstractBoolFilter
 *
 * @package DigiTouch\RocketFuel\Service\Filters
 */
abstract class AbstractBoolFilter implements FilterInterface
{
    /** @var bool */
    private $value;

    /**
     * AdvertisementServiceBonusFilter constructor.
     *
     * @param bool $value
     */
    public function __construct($value)
    {
        $this->value = $value;
    }

    /**
     * {@inheritdoc}
     */
    abstract public function getName();

    /**
     * {@inheritdoc}
     */
    public function getValue()
    {
        return $this->value ? 'true' : 'false';
    }
}
