<?php

declare(strict_types=1);

use Tracy\Debugger;

switch (FRAMEWORK_ENVIRONMENT) {
    case 'development':
    case 'testing':
        Debugger::enable(Debugger::DEVELOPMENT);
        break;
    case 'staging':
    case 'production':
        Debugger::enable(Debugger::PRODUCTION);
        break;
}
