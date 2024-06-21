<?php

namespace App\Console\Commands;

use App\Models\Integration;
use Illuminate\Console\Command;

class AddIntegration extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'integration:add {marketplace} {username?} {password?}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'add a new integration';

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $marketplace = $this->argument('marketplace');
        $username = $this->argument('username');
        $password = $this->argument('password');

        $integration = Integration::create([
            'marketplace' => $marketplace,
            'username' => $username,
            'password' => $password,
        ]);

        $this->info('Integration added successfully!');
    }
}
