<?php /** @noinspection PhpFullyQualifiedNameUsageInspection */

declare(strict_types=1);

use Versalle\Container\Entry\ObjectEntry;

return [
    'objects' => [
        \App\HelloFriend\Action\HelloFriendIndexAction::class => [
            'class' => \App\HelloFriend\Action\HelloFriendIndexAction::class,
            'args' => [
                new ObjectEntry(\App\HelloFriend\Responder\HelloFriendIndexResponder::class),
            ]
        ],
        \App\HelloFriend\Responder\HelloFriendIndexResponder::class => [
            'class' => \App\HelloFriend\Responder\HelloFriendIndexResponder::class,
            'args' => [
                new ObjectEntry(\Versalle\Framework\ActionDomainResponder\Responder\Response\ViewFactory::class),
            ]
        ],
        \Versalle\Framework\ActionDomainResponder\Responder\Response\ViewFactory::class => [
            'class' => \Versalle\Framework\ActionDomainResponder\Responder\Response\ViewFactory::class,
            'args' => [
                new ObjectEntry(\Versalle\Framework\Presentation\Template\TwigTemplateRendererFactory::class),
            ]
        ],
        \Versalle\Framework\Presentation\Template\TwigTemplateRendererFactory::class => [
            'class' => \Versalle\Framework\Presentation\Template\TwigTemplateRendererFactory::class,
        ],
    ],
    'parameters' => [

    ],
];
