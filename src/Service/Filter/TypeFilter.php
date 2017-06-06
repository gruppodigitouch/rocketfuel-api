<?php

namespace DigiTouch\RocketFuel\Service\Filter;

/**
 * Class TypeFilter
 *
 * @package DigiTouch\RocketFuel\Service\Filter
 */
class TypeFilter extends AbstractRegexFilter
{
    const TYPE_TEXT = 0;
    const TYPE_HTML = 1;
    const TYPE_IMAGE = 2;
    const TYPE_FLASH = 3;
    const TYPE_VAST_VIDEO = 4;
    const TYPE_FACEBOOK_RHS = 5;
    const TYPE_FACEBOOK_NEWS_FEED = 6;
    const TYPE_FACEBOOK_VIDEO = 8;

    /**
     * {@inheritdoc}
     */
    public function getName()
    {
        return 'type';
    }

    /**
     * @inheritdoc
     */
    protected function getRegex()
    {
        return '/^(?:[0-8],)*(?:[0-8])$/';
    }
}
