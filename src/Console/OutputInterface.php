<?php
namespace Flvrs\Statisch\Console;

interface OutputInterface {
    public function write(string $message);
    public function writeMessages(array $messages);
}