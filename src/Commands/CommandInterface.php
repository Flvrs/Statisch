<?php
namespace Flvrs\Statisch\Commands;

interface CommandInterface
{
    public function __construct();
    public function getName() : string;
    public function getDescription() : string;
    public function getHelpText() : string;
    public function getAliases() : array;
    public function run() : bool;
}