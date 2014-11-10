<?php

use Malarrimo\Repositories\User;

class UserController extends BaseController {

    /**
     * @var User
     */
    protected $userRepo;

    public function __construct(User $userRepository)
    {
        $this->userRepo = $userRepository;
    }

    public function getList()
    {
        $users = $this->userRepo->getActives();
        return View::make('admin/users')->with('users', $users);
    }

    public function create()
    {
        dd(Input::all());
    }

} 