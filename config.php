<?php

return [
    Flvrs\Statisch\Console\InputInterface::class => DI\Create(Flvrs\Statisch\Console\ConsoleInput::class),
    Flvrs\Statisch\Console\OutputInterface::class => DI\Create(Flvrs\Statisch\Console\ConsoleOutput::class),
];