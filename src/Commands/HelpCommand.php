<?php
namespace Flvrs\Statisch\Commands;

class HelpCommand implements CommandInterface
{
    private $name;
    private $description;
    private $help;
    private $aliases = [];

    public function __construct() {}
    public function getName() : string {}
    public function getDescription() : string {}
    public function getHelpText() : string {}
    public function getAliases() : array {}
    public function run() : bool {}
}