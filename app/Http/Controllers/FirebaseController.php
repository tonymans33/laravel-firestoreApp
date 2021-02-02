<?php

namespace App\Http\Controllers;

use App\Http\Requests\InsertItemRequest;
use App\Http\Requests\UpdateItemRequest;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class FirebaseController extends Controller
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
     * Function to send the items from the firestore to the dashboard
     *
     * @return Renderable
     */
    public function index()
    {
        // Retrieving all data from firestore
        $items = app('firebase.firestore')->database()->collection('Items')->documents();

        return view('home')->with('items', $items);
    }

    /**
     * Function to go to insert page for creating a new item
     * @return Factory|View
     */
    public function insert(){
        return view('insert');
    }

    public function store(InsertItemRequest $request){

        $data = $request->validated();

        // Creating a new item
        $stuRef = app('firebase.firestore')->database()->collection('Items')->newDocument();
        $stuRef->set([
            'title' => $data['title'],
            'cost' => $data['cost'],
        ]);

        return redirect()->route('home')->with(['successMsg' => 'Inserted !' ]);

    }

    /**
     * Function to go to edit route with a specific item with the given id
     * @param $id
     * @return Factory|View
     */
    public function edit($id){

        // Getting the specific item with the given id
        $item = app('firebase.firestore')->database()->collection('Items')->document($id)->snapshot();

        return view('editItem')->with('item', $item->data())->with('itemID', $item->id());

    }

    /**
     * Function to update some data in a given element
     * @param UpdateItemRequest $request
     * @param $id
     * @return RedirectResponse
     */
    public function update(UpdateItemRequest $request, $id){

        // Getting the document we want to update
        $item = app('firebase.firestore')->database()->collection('Items')->document($id);

        // validate the data
        $data = $request->validated();

        // Updating the fields we want
        $item->update([
            ['path' => 'title', 'value' => $data['title']], ['path' => 'cost', 'value' => $data['cost']]
        ]);

        // Return to the dashboard with a success message
        return redirect()->route('home')->with(['successMsg' => 'Updated !' ]);

    }
}
