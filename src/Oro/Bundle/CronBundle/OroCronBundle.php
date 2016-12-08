<?php

namespace Oro\Bundle\CronBundle;

use Oro\Bundle\CronBundle\Async\Topics;
use Oro\Bundle\MessageQueueBundle\DependencyInjection\Compiler\AddTopicMetaPass;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\HttpKernel\Bundle\Bundle;

class OroCronBundle extends Bundle
{

    /**
     * {@inheritdoc}
     */
    public function build(ContainerBuilder $container)
    {
        parent::build($container);

        $addTopicPass = AddTopicMetaPass::create()
            ->add(Topics::RUN_COMMAND, 'Runs a symfony console command')
        ;

        $container->addCompilerPass($addTopicPass);
    }
}
