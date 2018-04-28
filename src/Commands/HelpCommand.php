<?php

namespace Flvrs\Statisch\Commands;

class HelpCommand implements CommandInterface
{
    private $name = 'Help';
    private $description = 'Get help on all of your commands';
    private $help = 'bin/vendor/flvrs/statisch help';
    private $aliases = [];

    public function __construct()
    {
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function getHelpText(): string
    {
        return $this->help;
    }

    public function getAliases(): array
    {
        return $this->aliases;
    }

    public function run(): bool
    {
        return false;
    }
}