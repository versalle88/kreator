<?php

/**
 * @noinspection PhpFullyQualifiedNameUsageInspection
 */

declare(strict_types=1);

use Versalle\Container\Entry\ObjectEntry;
use Versalle\Container\Entry\ParameterEntry;

return [
    'objects'    => [
        \Versalle\Framework\FileSystem\DirectoryList::class                             => [
            'class' => \Versalle\Framework\FileSystem\DirectoryList::class,
            'args'  => [
                new ParameterEntry('framework.constants.root_dir'),
            ],
        ],
        \Versalle\Framework\Application\ApplicationInterface::class                     => [
            'class' => \Versalle\Framework\Application\HttpApplication::class,
            'args'  => [
                new ObjectEntry(\Versalle\Framework\Application\FrontControllerInterface::class),
            ],
        ],
        \Versalle\Framework\Application\FrontControllerInterface::class                 => [
            'class' => \Versalle\Framework\Application\FrontController::class,
            'args'  => [
                new ObjectEntry(\Versalle\Framework\Application\RouterInterface::class),
            ],
        ],
        \Versalle\Framework\Application\RouterInterface::class                          => [
            'class' => \Versalle\Framework\Application\NikicFastRouteRouter::class,
            'args'  => [
                new ObjectEntry(\Versalle\Framework\FileSystem\DirectoryList::class),
            ],
        ],
        \App\HelloFriend\Action\HelloFriendIndexAction::class                           => [
            'class' => \App\HelloFriend\Action\HelloFriendIndexAction::class,
            'args'  => [
                new ObjectEntry(\App\HelloFriend\Responder\HelloFriendIndexResponder::class),
            ],
        ],
        \App\HelloFriend\Responder\HelloFriendIndexResponder::class                     => [
            'class' => \App\HelloFriend\Responder\HelloFriendIndexResponder::class,
            'args'  => [
                new ObjectEntry(\Versalle\Framework\ActionDomainResponder\Responder\Response\ViewFactory::class),
            ],
        ],
        \Versalle\Framework\ActionDomainResponder\Responder\Response\ViewFactory::class => [
            'class' => \Versalle\Framework\ActionDomainResponder\Responder\Response\ViewFactory::class,
            'args'  => [
                new ObjectEntry(\Versalle\Framework\Presentation\Template\TwigTemplateRendererFactory::class),
            ],
        ],
        \Versalle\Framework\Presentation\Template\TwigTemplateRendererFactory::class    => [
            'class' => \Versalle\Framework\Presentation\Template\TwigTemplateRendererFactory::class,
            'args'  => [
                new ObjectEntry(\Versalle\Framework\FileSystem\DirectoryList::class),
            ],
        ],
    ],
    'parameters' => [
        'framework' => [
            'constants' => [
                'root_dir' => FRAMEWORK_ROOT_DIR,
            ],
        ],
    ],
];
