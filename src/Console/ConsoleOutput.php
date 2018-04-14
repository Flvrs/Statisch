<?php

namespace Flvrs\Statisch\Console;

class ConsoleOutput implements OutputInterface
{
    private $stdout = null;

    private function __construct()
    {
        $this->stdout = fopen('php://stdout', 'w');
    }

    public function write(string $message) : void
    {
        fwrite($this->stdout, $message);
    }

    public function writeMessages(array $messages) : void
    {
        foreach ($messages as $message) {
            $this->write($message);
        }
    }
}