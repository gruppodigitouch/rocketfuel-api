<?php

namespace DigiTouch\RocketFuel\Service\Filter;

/**
 * Class StartDateFilter
 *
 * @package DigiTouch\RocketFuel\Service\Filters
 */
class StartDateFilter extends AbstractDateFilter
{
    /**
     * {@inheritdoc}
     */
    public function getName()
    {
        return 'start_date';
    }
}
