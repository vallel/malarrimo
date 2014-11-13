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
        $userData = Input::only(['userName', 'email', 'password']);
        $this->userRepo->create($userData['userName'], $userData['email'], $userData['password']);
        return Redirect::to('admin/usuarios')->with('msg', '<p class="alert alert-success">Usuario <strong>' . $userData['userName'] . '</strong> creado</p>');
    }

} 