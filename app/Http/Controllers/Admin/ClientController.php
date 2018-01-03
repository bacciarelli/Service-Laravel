<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\ClientRequest;
use App\Models\Client;
use App\Services\ClientService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\View\View;

/**
 * Class ClientController
 *
 * @package App\Http\Controllers\Admin
 */
class ClientController extends Controller
{
    protected $clientService;

    /**
     * ClientController constructor.
     *
     * @param ClientService $clientService ClientService object
     */
    public function __construct(ClientService $clientService)
    {
        $this->clientService = $clientService;
    }

    /**
     * Display a listing of the resource.
     *
     * @param Request $request Request object
     *
     * @return View
     */
    public function index(Request $request): View
    {
        if ($request->ajax()) {
            return $this->clientService->ajaxResults($request);
        }

        return view('admin.client.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create(): View
    {
        return view('admin.client.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param ClientRequest $request Request object
     *
     * @return RedirectResponse
     */
    public function store(ClientRequest $request): RedirectResponse
    {
        if ($this->clientService->save($request->all()) instanceof Client) {
            return redirect()
                ->route("admin.clients.index")
                ->with('alert-success', trans('Client was created'));
        }

        return redirect()
            ->back()
            ->with('alert-danger', trans('Oops something went wrong!'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Client $client client model
     *
     * @return View
     */
    public function edit(Client $client): View
    {
        return view('admin.client.edit', compact('client'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param ClientRequest $request Request object
     * @param Client        $client  client model
     *
     * @return RedirectResponse
     */
    public function update(ClientRequest $request, Client  $client): RedirectResponse
    {
        if ($this->clientService->save($request->all(), $client) instanceof Client) {
            return redirect()
                ->route("admin.clients.index")
                ->with('alert-success', trans('Client was edited'));
        }

        return redirect()
            ->back()
            ->with('alert-danger', trans('Oops something went wrong!'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Client $client client model
     *
     * @return RedirectResponse
     */
    public function destroy(Client  $client): RedirectResponse
    {
        $client->delete();
        return redirect()
            ->back()
            ->with('alert-success', trans('Client was deleted'));
    }
}
