<?php

namespace Flvrs\Statisch\Commands;

use Flvrs\Statisch\Console\InputInterface;
use Flvrs\Statisch\Console\OutputInterface;

class InstallCommand implements CommandInterface
{
    private $name = 'Install';
    private $description = 'Install';
    private $help = 'vendor/bin/statisch install';
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
        try {
            $this->copyDistToWorkingDirectory();
        } catch (\Exception $e) {
            $this->output->writeMessages([
                'The Install Command encountered the following error:',
                $e->getMessage(),
                'Please ensure you have the correct permissions set.'
            ]);
        }

        return true;
    }

    public function copyDistToWorkingDirectory(): void
    {
        $install_dir = getcwd();
        $dist_dir = realpath(__DIR__ . '../../../dist');

        $dir = new \RecursiveDirectoryIterator($dist_dir, \FilesystemIterator::SKIP_DOTS);
        foreach (new \RecursiveIteratorIterator($dir) as $filename => $file) {
            $clean_dir_name = str_replace($dist_dir, '', $file->getPath());
            $new_path = $install_dir . $clean_dir_name;
            $new_file = $new_path . DIRECTORY_SEPARATOR . $file->getFilename();

            if (!is_dir($new_path)) {
                if (!mkdir($new_path)) {
                    throw new \Exception('Could not create folder: ' . $new_path);
                }
            }

            if (!copy($filename, $new_file)) {
                throw new \Exception('Could not create file: ' . $new_file);
            }
        }
    }
}