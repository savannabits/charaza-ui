<?php

namespace App\Console\Commands;

use App\Tenant;
use Illuminate\Console\Command;
use Illuminate\Support\Str;

class CreateTenant extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:tenant {id : The ID of the tenant, e.g foo}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new Tenant';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $id = $this->argument('id');
        if (!$id) {
            $this->error("The ID is required");
            exit(1);
        }
        $tenant = new Tenant();
        $tenant->id = Str::slug(trim($id));
        $tenant->route_prefix = $tenant->id;
        $tenant->name = Str::title(str_replace("-"," ",$tenant->id));
        $tenant->saveOrFail();
        $tenant->domains()->create(["domain" => $tenant->id]);
        return 0;
    }
}
