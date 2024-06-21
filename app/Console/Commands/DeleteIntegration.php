<?php

namespace App\Console\Commands;

use App\Models\Integration;
use Illuminate\Console\Command;

class DeleteIntegration extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'integration:delete {id}';


    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'delete integration';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $id = $this->argument('id');
        $integration = Integration::find($id);

        if ($integration) {
            $integration->delete();
            $this->info('Integration removed successfully');
        } else {
            $this->error('Integration not foun.');
        }
    }
}
