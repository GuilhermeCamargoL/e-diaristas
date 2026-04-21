<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Servico;
use App\Models\UserApi;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $topDiaristas = UserApi::diarista()
            ->with('servicos:id,nome')
            ->orderByDesc('reputacao')
            ->limit(4)
            ->get();

        return view('home', [
            'topDiaristas' => $topDiaristas,
            'servicosCount' => Servico::count(),
            'usuariosCount' => User::count(),
        ]);
    }
}
