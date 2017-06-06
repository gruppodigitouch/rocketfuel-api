<?php

namespace DigiTouch\RocketFuel\Service\Filter;

/**
 * Class EndDateFilter
 *
 * @package DigiTouch\RocketFuel\Service\Filters
 */
class EndDateFilter extends AbstractDateFilter
{
    /**
     * {@inheritdoc}
     */
    public function getName()
    {
        return 'end_date';
    }
}
