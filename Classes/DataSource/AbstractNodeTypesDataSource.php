<?php

namespace UpAssist\Neos\RSSFeed\DataSource;

use Neos\ContentRepository\Core\NodeType\NodeType;
use Neos\ContentRepository\Core\Projection\ContentGraph\Node;
use Neos\ContentRepository\Core\SharedModel\ContentRepository\ContentRepositoryId;
use Neos\ContentRepositoryRegistry\ContentRepositoryRegistry;
use Neos\Flow\Annotations as Flow;
use Neos\Neos\Service\DataSource\AbstractDataSource;

/**
 * Lists the node types configured in a setting as select box options.
 * An abstract type (a mixin) is expanded to the types that inherit from it.
 */
abstract class AbstractNodeTypesDataSource extends AbstractDataSource
{
    #[Flow\Inject]
    protected ContentRepositoryRegistry $contentRepositoryRegistry;

    /**
     * @return array<string>
     */
    abstract protected function getAllowedTypes(): array;

    /**
     * @return array<int, array{value: string, label: string}>
     */
    public function getData(?Node $node = null, array $arguments = [])
    {
        $allowedTypes = $this->getAllowedTypes();
        if ($allowedTypes === []) {
            return [];
        }

        $contentRepositoryId = $node?->contentRepositoryId ?? ContentRepositoryId::fromString('default');
        $nodeTypeManager = $this->contentRepositoryRegistry->get($contentRepositoryId)->getNodeTypeManager();

        $options = [];
        foreach ($nodeTypeManager->getNodeTypes() as $nodeType) {
            if (!in_array($nodeType->name->value, $allowedTypes, true)) {
                continue;
            }
            if ($nodeType->isAbstract()) {
                foreach ($nodeTypeManager->getSubNodeTypes($nodeType->name) as $subNodeType) {
                    $options[] = $this->option($subNodeType);
                }
            } else {
                $options[] = $this->option($nodeType);
            }
        }

        return $options;
    }

    /**
     * @return array{value: string, label: string}
     */
    private function option(NodeType $nodeType): array
    {
        return [
            'value' => $nodeType->name->value,
            'label' => $nodeType->getLabel(),
        ];
    }
}
