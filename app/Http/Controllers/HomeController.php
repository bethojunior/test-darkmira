<?php

namespace App\Http\Controllers;

use App\Services\User\UserService;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{

    private $userService;

    /**
     * HomeController constructor.
     * @param UserService $userService
     */
    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $user = Auth::user();

        return view('home.dashboard');
    }
}
