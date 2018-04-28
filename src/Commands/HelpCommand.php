<?php

namespace Flvrs\Statisch\Commands;

use Flvrs\Statisch\Console\InputInterface;
use Flvrs\Statisch\Console\OutputInterface;

class HelpCommand implements CommandInterface
{
    private $name = 'Help';
    private $description = 'Get help on all of your commands';
    private $help = 'bin/vendor/flvrs/statisch help';
    private $aliases = [];

    private $input;
    private $output;

    public function __construct(InputInterface $input, OutputInterface $output)
    {
        $this->input = $input;
        $this->output = $output;
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