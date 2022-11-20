<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    // public function __construct(Firestore $firestore)
    // {
    //     $this->firestore = $firestore;
    // }

    public function index()
    {
        $auth = app('firebase.auth');
        $signInResult = $auth->signInWithEmailAndPassword('cabe2cabean214@gmail.com', 'secret214');
        $idToken = $signInResult->idToken();
        $employees = app('firebase.firestore')->database()->collection('employee')
            ->documents();
            // ->collection('presence')
            // ->documents();
            // dd($employees->rows()[0]->reference());
        return view('dashboard.dashboard-index', compact('employees'));
    }
}
