<?php

namespace UpAssist\Neos\RSSFeed\DataSource;

use Neos\Flow\Annotations as Flow;

class RSSContentTypesDataSource extends AbstractNodeTypesDataSource
{
    /**
     * @var string
     */
    protected static $identifier = 'rss-contenttypes';

    /**
     * @var array<string>|null
     */
    #[Flow\InjectConfiguration(path: 'allowedContentTypes', package: 'UpAssist.Neos.RSSFeed')]
    protected $allowedTypes;

    protected function getAllowedTypes(): array
    {
        return array_values($this->allowedTypes ?? []);
    }
}
