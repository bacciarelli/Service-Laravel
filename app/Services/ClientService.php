<?php

namespace App\Services;

use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\View\View;

/**
 * Class ClientService
 *
 * @package App\Services
 */
class ClientService
{

    /**
     * Return clients filtered by name
     *
     * @param Request $request Request object
     *
     * @return View
     */
    public function ajaxResults(Request $request): View
    {
        $clients = Client::orderBy('name');
        if ($request->search != null) {
            $clients = $clients->where('name', 'like', '%' . $request->search . '%')
                ->orWhere('number', 'like', '%' . $request->search . '%');
        }
        $clients = $clients->paginate(10);

        return view('admin.client.index-table', compact('clients'));
    }

    /**
     * Create or update client
     *
     * @param array       $params new params for client
     * @param Client|null $client pass client object or new will be created
     *
     * @return Client|null
     */
    public function save(array $params, Client $client = null): ?Client
    {
        app()->db->beginTransaction();

        $client = $client ?? new Client();
        if (array_get($params, 'name')) {
            $client->name = array_get($params, 'name');
        }
        if (array_get($params, 'number')) {
            $client->number = array_get($params, 'number');
        }

        if ($client->save()) {
            app()->db->commit();
            return $client;
        }

        app()->db->rollback();
        return null;
    }
}