<?php

namespace Modules\Admin\Http\Controllers\Admin;

use App\Exceptions\V1\Admin\AdminNotFoundException;
use App\Http\Controllers\Controller;
use App\Services\V1\RepositoryServices\AdminService;
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
    /**
     * @param UpdateAdminRequest $request
     * @param int $id
     * @return JsonResponse
     */
    public function update(UpdateAdminRequest $request, $id)
    {
        dd($request->validated());
        $test = $request->validated();

        return $this->adminService->updateAdmin($request->validated(), $id);
    }

    //delete
    /**
     * @param int $id
     * @return JsonResponse
     */
    public function destroy($id)
    {
        try {
            $this->adminService->deleteAdmin($id);
            return response()->json(['status' => true, 'message' => 'Admin deleted successfully']);
        } catch (AdminNotFoundException $th) {
            return response()->json(['status' => false, 'message' => 'Admin not found']);
        }
    }

    //delete multiple
    public function deleteMultiple(Request $request)
    {
        // return $this->adminService->deleteMultipleAdmin($request->all());
    }

    //read
    /**
     * @param int $id
     * @return Admin
     */
    public function read($id)
    {
        return $this->adminService->findOrFailAdmin($id);
    }
}
