<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateUserDataRequest;
use App\Http\Requests\UpdateUserDataRequest;
use App\Repositories\UserDataRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class UserDataController extends AppBaseController
{
    /** @var  UserDataRepository */
    private $userDataRepository;

    public function __construct(UserDataRepository $userDataRepo)
    {
        $this->userDataRepository = $userDataRepo;
    }

    /**
     * Display a listing of the UserData.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->userDataRepository->pushCriteria(new RequestCriteria($request));
        $userDatas = $this->userDataRepository->all();

        return view('user_datas.index')
            ->with('userDatas', $userDatas);
    }

    /**
     * Show the form for creating a new UserData.
     *
     * @return Response
     */
    public function create()
    {
        return view('user_datas.create');
    }

    /**
     * Store a newly created UserData in storage.
     *
     * @param CreateUserDataRequest $request
     *
     * @return Response
     */
    public function store(CreateUserDataRequest $request)
    {
        $input = $request->all();

        $userData = $this->userDataRepository->create($input);

        Flash::success('User Data saved successfully.');

        return redirect(route('userDatas.index'));
    }

    /**
     * Display the specified UserData.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $userData = $this->userDataRepository->findWithoutFail($id);

        if (empty($userData)) {
            Flash::error('User Data not found');

            return redirect(route('userDatas.index'));
        }

        return view('user_datas.show')->with('userData', $userData);
    }

    /**
     * Show the form for editing the specified UserData.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $userData = $this->userDataRepository->findWithoutFail($id);

        if (empty($userData)) {
            Flash::error('User Data not found');

            return redirect(route('userDatas.index'));
        }

        return view('user_datas.edit')->with('userData', $userData);
    }

    /**
     * Update the specified UserData in storage.
     *
     * @param  int              $id
     * @param UpdateUserDataRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateUserDataRequest $request)
    {
        $userData = $this->userDataRepository->findWithoutFail($id);

        if (empty($userData)) {
            Flash::error('User Data not found');

            return redirect(route('userDatas.index'));
        }

        $userData = $this->userDataRepository->update($request->all(), $id);

        Flash::success('User Data updated successfully.');

        return redirect(route('userDatas.index'));
    }

    /**
     * Remove the specified UserData from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $userData = $this->userDataRepository->findWithoutFail($id);

        if (empty($userData)) {
            Flash::error('User Data not found');

            return redirect(route('userDatas.index'));
        }

        $this->userDataRepository->delete($id);

        Flash::success('User Data deleted successfully.');

        return redirect(route('userDatas.index'));
    }
}
