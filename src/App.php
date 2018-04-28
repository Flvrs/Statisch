<?php

namespace Flvrs\Statisch;

use Psr\Container\ContainerInterface;

class App
{
    private $container;
    private $commands = [];

    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;
    }

    public function bootstrap(array $classes): App
    {
        foreach ($classes as $class) {
            $this->registerCommand($this->container->get($class));
        }

        return $this;
    }

    public function registerCommand(Commands\CommandInterface $command): void
    {
        $this->commands[strtolower($command->getName())] = $command;

        foreach ($command->getAliases() as $alias) {
            $this->commands[strtolower($alias)] = $command;
        }
    }

    public function run(): void
    {
        $input = $this->container->get(Console\InputInterface::class);
        $output = $this->container->get(Console\OutputInterface::class);

        if (!array_key_exists(strtolower($input->getCommandArgument()), $this->commands)) {
            // @TODO Proper output and escape
            $output->write('Command Not Found');
            return;
        }

        $this->commands[strtolower($input->getCommandArgument())]->run();
    }
}