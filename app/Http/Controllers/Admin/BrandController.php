<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\BrandRequest;
use App\Models\Brand;
use App\Services\BrandService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\View\View;

/**
 * Class BrandController
 *
 * @package App\Http\Controllers\Admin
 */
class BrandController extends Controller
{
    protected $brandService;

    /**
     * BrandController constructor.
     *
     * @param BrandService $brandService BrandService object
     */
    public function __construct(BrandService $brandService)
    {
        $this->brandService = $brandService;
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
            return $this->brandService->ajaxResults($request);
        }

        return view('admin.brand.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create(): View
    {
        return view('admin.brand.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param BrandRequest $request Request object
     *
     * @return RedirectResponse
     */
    public function store(BrandRequest $request): RedirectResponse
    {
        if ($this->brandService->save($request->all()) instanceof Brand) {

            return redirect()
                ->route("admin.brands.index")
                ->with('alert-success', trans('Brand was created'));
        }

        return redirect()->back()
            ->with('alert-danger', trans('Oops something went wrong!'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Brand $brand brand model
     *
     * @return View
     */
    public function edit(Brand $brand): View
    {
        return view('admin.brand.edit', compact('brand'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param BrandRequest $request Request object
     * @param Brand        $brand   brand model
     *
     * @return RedirectResponse
     */
    public function update(BrandRequest $request, Brand  $brand): RedirectResponse
    {
        if ($this->brandService->save($request->all(), $brand) instanceof Brand) {

            return redirect()
                ->route("admin.brands.index")
                ->with('alert-success', trans('Brand was edited'));
        }

        return redirect()
            ->back()
            ->with('alert-danger', trans('Oops something went wrong!'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Brand $brand brand model
     *
     * @return RedirectResponse
     */
    public function destroy(Brand  $brand): RedirectResponse
    {
        $brand->delete();
        return redirect()->back()->with('alert-success', trans('Brand was deleted'));
    }
}
