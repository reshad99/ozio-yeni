<?php

namespace Modules\Admin\Http\Controllers\Admin;

use App\Exceptions\V1\Admin\AdminNotFoundException;
use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Services\V1\RepositoryServices\AdminService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Modules\Admin\Http\Requests\Admin\DeleteMultipleAdminRequest;
use Modules\Admin\Http\Requests\Admin\StoreAdminRequest;
use Modules\Admin\Http\Requests\Admin\UpdateAdminRequest;

class AdminController extends Controller
{
    /**
     * @param AdminService $adminService
     */
    public function __construct(protected AdminService $adminService)
    {
    }

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

    /**
     * @param StoreAdminRequest $request
     * @return Admin
     */
    public function store(StoreAdminRequest $request)
    {
        return $this->adminService->createAdmin($request);
    }

    /**
     * @param UpdateAdminRequest $request
     * @param int $id
     * @return JsonResponse
     */
    public function update(UpdateAdminRequest $request, $id)
    {
        try {
            $this->adminService->updateAdmin($request, $id);
            return response()->json(['status' => true, 'message' => 'Admin updated successfully']);
            //code...
        } catch (AdminNotFoundException $th) {
            return response()->json(['status' => false, 'message' => 'Admin not found']);
        }
    }

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

    /**
     * @param DeleteMultipleAdminRequest $request
     * @return JsonResponse
     */
    public function destroyMultiple(DeleteMultipleAdminRequest $request): JsonResponse
    {
        try {
            $this->adminService->deleteMultipleAdmin($request->input('ids'));
            return response()->json(['status' => true, 'message' => 'Admin deleted successfully']);
        } catch (AdminNotFoundException $th) {
            return response()->json(['status' => false, 'message' => 'Admin not found']);
        }
    }

    /**
     * @param int $id
     * @return Admin|JsonResponse
     */
    public function read($id)
    {
        try {
            $model = $this->adminService->findOrFailAdmin($id);
            return $model;
        } catch (\Throwable $th) {
            return response()->json(['status' => false, 'message' => 'Admin not found']);
        }
    }
}
