<?php

use Malarrimo\Repositories\User;
use Malarrimo\Managers\UserManager;

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
        $users = $this->userRepo->getAll();
        return View::make('admin/users')->with('users', $users);
    }

    public function add()
    {
        return View::make('admin/user');
    }

    public function create()
    {
        $user = $this->userRepo->newUser();
        $manager = new UserManager($user, Input::all());

        if ($manager->save())
        {
            return Redirect::to('admin/usuarios')->with('msg', '<p class="alert alert-success">Usuario creado</p>');
        }

        return Redirect::back()->withInput()->withErrors($manager->getErrors());
    }

} 