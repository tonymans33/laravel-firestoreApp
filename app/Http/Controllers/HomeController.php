<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateItemRequest;
use Google\Cloud\Firestore\FirestoreClient;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;

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


}
