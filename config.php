<?php

return [
    Flvrs\Statisch\Console\InputInterface::class => Di\Create(Flvrs\Statisch\Console\ConsoleInput::class),
    Flvrs\Statisch\Console\OutputInterface::class => Di\Create(Flvrs\Statisch\Console\ConsoleOutput::class),
];