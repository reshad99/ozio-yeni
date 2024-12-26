<?php

namespace Modules\Admin\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Services\V1\RepositoryServices\UserService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Modules\Admin\Http\Requests\User\StoreUserRequest;
use Modules\Admin\Http\Requests\User\UpdateUserRequest;
use Modules\Admin\Http\Requests\User\DeleteMultipleUserRequest;
use App\Exceptions\V1\User\UserNotFoundException;

class AdminUserController extends Controller
{
    /**
     * @param UserService $userService
     */
    public function __construct(protected UserService $userService)
    {
    }

    /**
     * Display a listing of the resource.
     * @return View
     */
    public function index()
    {
        return view('admin::pages.users.list.index');
    }

    /**
     * Display a listing of the resource.
     * @param Request $request
     * @return JsonResponse
     */
    public function datatable(Request $request)
    {
        return $this->userService->yajraDatatableExport($request);
    }

    /**
     * @param StoreUserRequest $request
     * @return User
     */
    public function store(StoreUserRequest $request)
    {
        // $request['want_notification'] = $request->has('want_notification') ? $request->want_notification : 0;
        return $this->userService->createUser($request);
    }

    //update

    /**
     * @param UpdateUserRequest $request
     * @param int $id
     * @return JsonResponse
     */
    public function update(UpdateUserRequest $request, $id)
    {
        try {
            $this->userService->updateUser($request, $id);
            return response()->json(['status' => true, 'message' => 'User updated successfully']);
            //code...
        } catch (UserNotFoundException $th) {
            return response()->json(['status' => false, 'message' => 'User not found']);
        }
    }

    //delete

    /**
     * @param int $id
     * @return JsonResponse
     */
    public function destroy($id)
    {
        try {
            $this->userService->deleteUser($id);
            return response()->json(['status' => true, 'message' => 'User deleted successfully']);
        } catch (UserNotFoundException $th) {
            return response()->json(['status' => false, 'message' => 'User not found']);
        }
    }

    /**
     * @param DeleteMultipleUserRequest $request
     * @return JsonResponse
     */
    public function destroyMultiple(Request $request): JsonResponse
    {
        try {
//            dd($request->all());
            $this->userService->deleteMultipleUser($request->input('ids'));
            return response()->json(['status' => true, 'message' => 'User deleted successfully']);
        } catch (UserNotFoundException $th) {
            return response()->json(['status' => false, 'message' => 'User not found']);
        }
    }

    //read

    /**
     * @param int $id
     * @return User|JsonResponse
     */
    public function read($id)
    {
        try {
            $model = $this->userService->findOrFailUser($id);
            return $model;
        } catch (\Throwable $th) {
            return response()->json(['status' => false, 'message' => 'User not found']);
        }
    }
}
