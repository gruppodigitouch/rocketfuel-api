<?php

namespace DigiTouch\RocketFuel\Service;

use DigiTouch\RocketFuel\Model\Service\ReportFilterInterface;

/**
 * Class ReportFilter
 *
 * @package DigiTouch\RocketFuel\Service
 */
class ReportFilter implements ReportFilterInterface
{
    /** @var string */
    private $name;

    /** @var string */
    private $operator;

    /** @var mixed */
    private $value;

    /**
     * ReportFilter constructor.
     *
     * @param string $name
     * @param string $operator
     * @param mixed  $value
     */
    public function __construct($name, $operator, $value)
    {
        $this->name = $name;
        $this->operator = $operator;
        $this->value = $value;
    }

    /**
     * {@inheritdoc}
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * {@inheritdoc}
     */
    public function getOperator()
    {
        return $this->operator;
    }

    /**
     * {@inheritdoc}
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * {@inheritdoc}
     */
    public function jsonSerialize()
    {
        return [
            $this->getName() => [
                $this->getOperator() => $this->getValue()
            ]
        ];
    }
}
