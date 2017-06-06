<?php

namespace DigiTouch\RocketFuel\Service\Filter;

use DateTimeImmutable;
use DigiTouch\RocketFuel\Model\Service\FilterInterface;

/**
 * Class AbstractDateFilter
 *
 * @package DigiTouch\RocketFuel\Service\Filters
 */
abstract class AbstractDateFilter implements FilterInterface
{
    /** @var DateTimeImmutable */
    private $value;

    /**
     * AbstractDateFilter constructor.
     *
     * @param DateTimeImmutable $value
     */
    public function __construct(DateTimeImmutable $value)
    {
        $this->value = $value;
    }

    /**
     * {@inheritdoc}
     */
    abstract public function getName();

    /**
     * @return string
     */
    public function getValue()
    {
        return $this->value->format('Y-m-d');
    }
}
