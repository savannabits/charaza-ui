<?php

namespace Savannabits\Savadmin;

use Illuminate\Console\Command;
use Illuminate\Filesystem\Filesystem;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputOption;

class Savadmin extends Command
{
    protected $name = "sv:generate";
    protected $description ="Scaffold a whole CRUD module";
    protected $files;

    public function handle(Filesystem $files) {
        $this->files = $files;

        $tableNameArgument = $this->argument('table_name');
        $modelOption = $this->option('model-name');
        $controllerOption = $this->option('controller-name');
        $exportOption = $this->option('with-export');
        $withoutBulkOptions = $this->option('without-bulk');
        $force = $this->option('force');

        $this->call('sv:generate:model', [
            'table_name' => $tableNameArgument,
            'class_name' => $modelOption,
            '--force' => $force,
        ]);

        /*$this->call('sv:generate:factory', [
            'table_name' => $tableNameArgument,
            '--model-name' => $modelOption,
            '--seed' => $this->option('seed'),
        ]);

        $this->call('sv:generate:controller', [
            'table_name' => $tableNameArgument,
            'class_name' => $controllerOption,
            '--model-name' => $modelOption,
            '--force' => $force,
            '--with-export' => $exportOption,
            '--without-bulk' => $withoutBulkOptions,
        ]);

        $this->call('sv:generate:request:index', [
            'table_name' => $tableNameArgument,
            '--model-name' => $modelOption,
            '--force' => $force,
        ]);

        $this->call('sv:generate:request:store', [
            'table_name' => $tableNameArgument,
            '--model-name' => $modelOption,
            '--force' => $force,
        ]);

        $this->call('sv:generate:request:update', [
            'table_name' => $tableNameArgument,
            '--model-name' => $modelOption,
            '--force' => $force,
        ]);

        $this->call('sv:generate:request:destroy', [
            'table_name' => $tableNameArgument,
            '--model-name' => $modelOption,
            '--force' => $force,
        ]);

        if(!$withoutBulkOptions) {
            $this->call('sv:generate:request:bulk-destroy', [
                'table_name' => $tableNameArgument,
                '--model-name' => $modelOption,
                '--force' => $force,
            ]);
        }

        $this->call('sv:generate:routes', [
            'table_name' => $tableNameArgument,
            '--model-name' => $modelOption,
            '--controller-name' => $controllerOption,
            '--with-export' => $exportOption,
            '--without-bulk' => $withoutBulkOptions,
        ]);

        $this->call('sv:generate:index', [
            'table_name' => $tableNameArgument,
            '--model-name' => $modelOption,
            '--force' => $force,
            '--with-export' => $exportOption,
            '--without-bulk' => $withoutBulkOptions,
        ]);

        $this->call('sv:generate:form', [
            'table_name' => $tableNameArgument,
            '--model-name' => $modelOption,
            '--force' => $force,
        ]);

        $this->call('sv:generate:lang', [
            'table_name' => $tableNameArgument,
            '--model-name' => $modelOption,
            '--with-export' => $exportOption,
        ]);

        if($exportOption){
            $this->call('sv:generate:export', [
                'table_name' => $tableNameArgument,
                '--force' => $force,
            ]);
        }

        if ($this->shouldGeneratePermissionsMigration()) {
            $this->call('sv:generate:permissions', [
                'table_name' => $tableNameArgument,
                '--model-name' => $modelOption,
                '--force' => $force,
                '--without-bulk' => $withoutBulkOptions,
            ]);

            if ($this->option('no-interaction') || $this->confirm('Do you want to attach generated permissions to the default role now?', true)) {
                $this->call('migrate');
            }
        }*/

        $this->info('Generating whole admin module finished');
    }

    protected function getArguments() {
        return [
            ['table_name', InputArgument::REQUIRED, 'Name of the existing table'],
        ];
    }

    protected function getOptions() {
        return [
            ['model-name', 'm', InputOption::VALUE_OPTIONAL, 'Specify custom model name'],
            ['controller-name', 'c', InputOption::VALUE_OPTIONAL, 'Specify custom controller name'],
            ['seed', 's', InputOption::VALUE_NONE, 'Seeds the table with fake data'],
            ['force', 'f', InputOption::VALUE_NONE, 'Force will delete files before regenerating admin'],
            ['with-export', 'e', InputOption::VALUE_NONE, 'Generate an option to Export as Excel'],
            ['without-bulk', 'wb', InputOption::VALUE_NONE, 'Generate without bulk options'],
        ];
    }

    protected function shouldGeneratePermissionsMigration() {
        if (class_exists('\Savannabits\Savadmin\SavadminServiceProvider')) {
            return true;
        }

        return false;
    }
}
