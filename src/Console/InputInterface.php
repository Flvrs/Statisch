<?php
namespace Flvrs\Statisch\Console;

interface InputInterface {
    public function getCommandArgument() : string;
    public function getArguments() : array;
    public function getOptions() : array;
}