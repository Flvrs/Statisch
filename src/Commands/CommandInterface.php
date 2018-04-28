<?php
namespace Flvrs\Statisch\Commands;

use Flvrs\Statisch\Console\InputInterface;
use Flvrs\Statisch\Console\OutputInterface;

interface CommandInterface
{
    public function __construct(InputInterface $input, OutputInterface $output);
    public function getName() : string;
    public function getDescription() : string;
    public function getHelpText() : string;
    public function getAliases() : array;
    public function run() : bool;
}