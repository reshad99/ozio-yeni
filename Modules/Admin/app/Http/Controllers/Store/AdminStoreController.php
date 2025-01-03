<?php

namespace Modules\Admin\Http\Controllers\Store;

use App\Exceptions\V1\Store\StoreNotFoundException;
use App\Http\Controllers\Controller;
use App\Models\Store;
use App\Services\V1\RepositoryServices\StoreService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Modules\Admin\Http\Requests\Store\ChangeStatusMultipleStoreRequest;
use Modules\Admin\Http\Requests\Store\DeleteMultipleStoreRequest;
use Modules\Admin\Http\Requests\Store\StoreStoreRequest;
use Modules\Admin\Http\Requests\Store\UpdateStoreRequest;

class AdminStoreController extends Controller
{
    /**
     * @param StoreService $storeService
     */
    public function __construct(protected StoreService $storeService)
    {
    }

    /**
     * @return View
     */
    public function index(): View
    {
        return view('admin::pages.stores.list.index');
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function datatable(Request $request): JsonResponse
    {
        return $this->storeService->yajraDatatableExport($request);
    }

    /**
     * @param StoreStoreRequest $request
     * @return Store
     */
    public function store(StoreStoreRequest $request): Store
    {
        return $this->storeService->createStore($request);
    }


    /**
     * @param UpdateStoreRequest $request
     * @param $id
     * @return JsonResponse
     */
    public function update(UpdateStoreRequest $request, $id): JsonResponse
    {
        try {
            $this->storeService->updateStore($request, $id);
            return response()->json(['status' => true, 'message' => 'Store updated successfully']);
        } catch (StoreNotFoundException $th) {
            return response()->json(['status' => false, 'message' => 'Store not found', 'error' => $th->getMessage()]);
        }
    }

    /**
     * @param $id
     * @return JsonResponse
     */
    public function destroy($id): JsonResponse
    {
        try {
            $this->storeService->deleteStore($id);
            return response()->json(['status' => true, 'message' => 'Store deleted successfully']);
        } catch (StoreNotFoundException $th) {
            return response()->json(['status' => false, 'message' => 'Store not found', 'error' => $th->getMessage()]);
        }
    }

    /**
     * @param DeleteMultipleStoreRequest $request
     * @return JsonResponse
     */
    public function destroyMultiple(DeleteMultipleStoreRequest $request): JsonResponse
    {
        try {
            $this->storeService->deleteMultipleStore($request->input('ids'));
            return response()->json(['status' => true, 'message' => 'Store deleted successfully']);
        } catch (StoreNotFoundException $th) {
            return response()->json(['status' => false, 'message' => 'Store not found', 'error' => $th->getMessage()]);
        }
    }

    /**
     * @param $id
     * @return Store|JsonResponse|null
     */
    public function read($id)
    {
        try {
            $model = $this->storeService->findOrFailStore($id);
            return $model;
        } catch (\Throwable $th) {
            return response()->json(['status' => false, 'message' => 'Store not found']);
        }
    }

    /**
     * @param $id
     * @return JsonResponse
     */
    public function changeStatus($id)
    {
        try {
            $this->storeService->changeStatus($id);
            return response()->json(['status' => true, 'message' => 'Store status changed successfully']);
        } catch (StoreNotFoundException $th) {
            return response()->json(['status' => false, 'message' => 'Store not found']);
        }
    }

    public function changeStatusMultiple(ChangeStatusMultipleStoreRequest $request): JsonResponse
    {
        try {
            $this->storeService->changeStatusMultiple($request->input('ids'), $request->input('status'));
            return response()->json(['status' => true, 'message' => 'Store status changed successfully']);
        } catch (StoreNotFoundException $th) {
            return response()->json(['status' => false, 'message' => 'Store not found', 'error' => $th->getMessage()]);
        } catch (\Throwable $th) {
            return response()->json(['status' => false, 'message' => 'Store not found', 'error' => $th->getMessage()]);
        }
    }
}
