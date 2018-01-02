<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\TypeRequest;
use App\Models\Type;
use App\Services\TypeService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\View\View;

/**
 * Class TypeController
 *
 * @package App\Http\Controllers\Admin
 */
class TypeController extends Controller
{
    protected $typeService;

    /**
     * TypeController constructor.
     *
     * @param TypeService $typeService TypeService object
     */
    public function __construct(TypeService $typeService)
    {
        $this->typeService = $typeService;
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
            return $this->typeService->ajaxResults($request);
        }

        return view('admin.type.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create(): View
    {
        return view('admin.type.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param TypeRequest $request Request object
     *
     * @return RedirectResponse
     */
    public function store(TypeRequest $request): RedirectResponse
    {
        if ($this->typeService->save($request->all()) instanceof Type) {
            return redirect()
                ->route("admin.types.index")
                ->with('alert-success', trans('Type was created'));
        }

        return redirect()->back()->with('alert-danger', trans('Oops something went wrong!'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Type  $type
     * @return View
     */
    public function edit(Type $type): View
    {
        return view('admin.type.edit', compact('type'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  TypeRequest $request Request object
     * @param  Type        $type    type model
     *
     * @return RedirectResponse
     */
    public function update(TypeRequest $request, Type  $type): RedirectResponse
    {
        if ($this->typeService->save($request->all(), $type) instanceof Type) {
            return redirect()
                ->route("admin.types.index")
                ->with('alert-success', trans('Type was edited'));
        }

        return redirect()->back()->with('alert-danger', trans('Oops something went wrong!'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Type  $type
     *
     * @return RedirectResponse
     */
    public function destroy(Type  $type): RedirectResponse
    {
        $type->delete();
        return redirect()->back()->with('alert-success', trans('Type was deleted'));
    }
}
