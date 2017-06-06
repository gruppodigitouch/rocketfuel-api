<?php

namespace DigiTouch\RocketFuel\Service\Filter;

use DigiTouch\RocketFuel\Model\Service\FilterInterface;
use InvalidArgumentException;

/**
 * Class AbstractRegexFilter
 *
 * @package DigiTouch\RocketFuel\Service\Filters
 */
abstract class AbstractRegexFilter implements FilterInterface
{
    /** @var string */
    private $value;

    /**
     * AbstractRegexFilter constructor.
     *
     * @param string $value
     *
     * @throws InvalidArgumentException
     */
    public function __construct($value)
    {
        $this->checkValue($value);

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
        return $this->value;
    }

    /**
     * @return string
     */
    abstract protected function getRegex();

    /**
     * @param string $value
     *
     * @throws \InvalidArgumentException
     */
    protected function checkValue($value)
    {
        if (!preg_match($this->getRegex(), $value)) {
            throw new InvalidArgumentException('Invalid value for filter '.$this->getName());
        }
    }
}
