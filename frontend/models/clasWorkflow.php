<?php
namespace frontend\models;
class PostWorkflow implements \raoul2000\workflow\source\file\IWorkflowDefinitionProvider 
{
    public function getDefinition() {
        return [
            'initialStatusId' => 'draft',
            'status' => [
                'draft' => [
                    'transition' => ['publish','deleted']
                ],
                'publish' => [
                    'transition' => ['draft','deleted']
                ],
                'deleted' => [
                    'transition' => ['draft']
                ]
            ]
        ];
    }
}
?>