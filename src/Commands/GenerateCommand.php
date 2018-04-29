<?php

namespace Flvrs\Statisch\Commands;

use Flvrs\Statisch\Console\InputInterface;
use Flvrs\Statisch\Console\OutputInterface;

class GenerateCommand implements CommandInterface
{
    private $name = 'Generate';
    private $description = 'Generate';
    private $help = 'vendor/bin/statisch generate';
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
        return true;
    }

}