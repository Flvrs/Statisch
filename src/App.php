<?php

namespace Flvrs\Statisch;

use Psr\Container\ContainerInterface;

class App
{
    private $container;
    private $input;
    private $output;
    private $commands = [];

    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;
        $this->input = $this->container->get(Console\InputInterface::class);
        $this->output = $this->container->get(Console\OutputInterface::class);
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
        if (!array_key_exists(strtolower($this->input->getCommandArgument()), $this->commands)) {
            // @TODO Proper output and escape
            $this->output->write('Command not found');
            return;
        }

        $commandCompletedSuccessfully = $this->commands[strtolower($this->input->getCommandArgument())]->run();

        if (!$commandCompletedSuccessfully) {
            $this->output->write('Command failed to execute');
        }
    }
}