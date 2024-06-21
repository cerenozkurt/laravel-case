<?php

namespace App\Console\Commands;

use App\Models\Integration;
use Illuminate\Console\Command;

class UpdateIntegration extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'integration:update {id} {marketplace?} {username?} {password?}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'integration update';

    /**
     * Execute the console command.
     */
    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $id = $this->argument('id');
        $marketplace = $this->argument('marketplace');
        $username = $this->argument('username');
        $password = $this->argument('password');

        $integration = Integration::find($id);

        if ($integration) {
            if ($marketplace) {
                $integration->marketplace = $marketplace;
            }
            if ($username) {
                $integration->username = $username;
            }
            if ($password) {
                $integration->password = $password;
            }
            $integration->save();

            $this->info('Integration updated');
        } else {
            $this->error('Integration not found');
        }
    }
}
