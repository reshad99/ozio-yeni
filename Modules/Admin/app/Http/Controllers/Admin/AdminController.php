<?php

namespace Modules\Admin\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\V1\RepositoryServices\AdminService;
use App\Services\V1\RepositoryServices\UserService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Modules\Admin\Http\Requests\Admin\StoreAdminRequest;
use Modules\Admin\Http\Requests\Admin\UpdateAdminRequest;

class AdminController extends Controller
{
    /**
     * @param AdminService $adminService
     */
    public function __construct(protected AdminService $adminService) {}

    /**
     * Display a listing of the resource.
     * @return View
     */
    public function index()
    {
        return view('admin::pages.admins.list.index');
    }


    /**
     * Display a listing of the resource.
     * @param Request $request
     * @return JsonResponse
     */
    public function datatable(Request $request)
    {
        return $this->adminService->yajraDatatableExport($request);
    }


    //store 
    public function store(StoreAdminRequest $request)
    {
        return $this->adminService->createAdmin($request->validated());
    }

    //update
    public function update(UpdateAdminRequest $request, $id)
    {
        return $this->adminService->updateAdmin($request->validated(), $id);
    }

    //delete
    public function destroy($id)
    {
        return $this->adminService->deleteAdmin($id);
    }

    //delete multiple
    public function deleteMultiple(Request $request)
    {
        // return $this->adminService->deleteMultipleAdmin($request->all());
    }

    //read
    public function read($id)
    {
        return $this->adminService->findOrFailAdmin($id);
    }

}
