<?php

namespace UpAssist\Neos\RSSFeed\DataSource;

use Neos\ContentRepository\Domain\Model\NodeInterface;
use Neos\ContentRepository\Domain\Service\NodeTypeManager;
use Neos\Neos\Service\DataSource\AbstractDataSource;
use Neos\Flow\Annotations as Flow;

class RSSContentTypesDataSource extends AbstractDataSource
{
    /**
     * @var array
     * @Flow\InjectConfiguration(path="allowedContentTypes", package="UpAssist.Neos.RSSFeed")
     */
    protected $allowedTypes;

    /**
     * @var NodeTypeManager
     * @Flow\Inject
     */
    protected $nodeTypeManager;

    /**
     * @var string
     */
    static protected $identifier = 'rss-contenttypes';

    /**
     * @inheritDoc
     */
    public function getData(NodeInterface $node = null, array $arguments = [])
    {
        $nodeTypes = [];



        if (empty($this->allowedTypes)) return $nodeTypes;

        foreach ($this->nodeTypeManager->getNodeTypes() as $nodeType) {
            if (in_array($nodeType->getName(), $this->allowedTypes)) {
                if ($nodeType->isAbstract()) {
                    $subNodeTypes = $this->nodeTypeManager->getSubNodeTypes($nodeType->getName());
                    foreach ($subNodeTypes as $subNodeType) {
                        $nodeTypes[] = [
                            'value' => $subNodeType->getName(),
                            'label' => $subNodeType->getLabel()
                        ];
                    }
                } else {
                    $nodeTypes[] = [
                        'value' => $nodeType->getName(),
                        'label' => $nodeType->getLabel()
                    ];
                }
            }
        }

        return $nodeTypes;
    }
}
