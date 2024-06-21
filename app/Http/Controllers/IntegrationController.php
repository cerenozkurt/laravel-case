<?php

namespace App\Http\Controllers;

use App\Http\Requests\Integration\StoreRequest;
use App\Http\Requests\Integration\UpdateRequest;
use App\Http\Resources\IntegrationResource;
use App\Models\Integration;
use Illuminate\Http\Request;

class IntegrationController extends Controller
{
    public function store(StoreRequest $request)
    {
        $integration = Integration::create([
            'marketplace' => $request->marketplace,
            'username' => $request->username,
            'password' => $request->password,
        ]);

        return $this->setMessage('Integration created successfully.')->setCustomData('integration', new IntegrationResource($integration))->responseSuccess();
    }

    public function update(UpdateRequest $request, Integration $integration)
    {
        if ($request->marketplace) {
            $integration->marketplace = $request->marketplace;
        }

        if ($request->username) {
            $integration->username = $request->username;
        }

        if ($request->password) {
            $integration->password = $request->password;
        }

        $integration->save();

        return $this
        ->setMessage('Integration updated successfully.')
        ->setCustomData('integration', new IntegrationResource($integration))->responseSuccess();
    }

    public function destroy(Integration $integration)
    {
        $integration->delete();
        return $this->setMessage('Integration deleted successfully.')->responseSuccess();
    }
}
