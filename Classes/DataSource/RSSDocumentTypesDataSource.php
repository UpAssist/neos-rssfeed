<?php

namespace UpAssist\Neos\RSSFeed\DataSource;

use Neos\Flow\Annotations as Flow;

class RSSDocumentTypesDataSource extends AbstractNodeTypesDataSource
{
    /**
     * @var string
     */
    protected static $identifier = 'rss-documenttypes';

    /**
     * @var array<string>|null
     */
    #[Flow\InjectConfiguration(path: 'allowedDocumentTypes', package: 'UpAssist.Neos.RSSFeed')]
    protected $allowedTypes;

    protected function getAllowedTypes(): array
    {
        return array_values($this->allowedTypes ?? []);
    }
}
