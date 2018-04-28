<?php

namespace Flvrs\Statisch\Console;

class ConsoleInput implements InputInterface
{
    private $args = [];

    public function __construct()
    {
        $this->args = $_SERVER['argv'];
    }

    public function getCommandArgument(): string
    {
        if (!isset($this->args[1])) {
            return '';
        }

        return $this->args[1];
    }

    public function getArguments(): array
    {
        return array_values(array_diff_key($this->args, [0, 1]));
    }

    public function getOptions(): array
    {
        // TODO: Implement getOptions() method.
    }
}