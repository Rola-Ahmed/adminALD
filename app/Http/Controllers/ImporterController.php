<?php

namespace App\Http\Controllers;

use App\Models\Importer;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;


class ImporterController extends Controller
{
    
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
       
        // $users =  Importer::with('user')->get();
        // dd($users);
        return view('importer.index');
    }


   

    public function getimportersData(Request $request)
{
            // <a href="'.route('importers.delete', ['id' => $importer->id]).'">

    $importers = Importer::with('user')->get();
    return DataTables::of($importers)
        ->addColumn('actions', function ($importer) {
           return '<a href="#">
                <i class="fas fa-fw fa-pen text-dark"></i>
            </a>
            <a href="#">
                <i class="fas fa-fw fa-eye text-blue mx-2"></i>
            </a>
            <a href="#" data-id="' . $importer->id . '" class="delete-importer">
                <i class="fas fa-fw fa-trash text-danger"></i>
            </a>';
        })
        ->editColumn('accountEmail', function($importer) {
            return $importer->user ? $importer->user->email : 'N/A'; // Accessing user email
        })
        ->rawColumns(['actions'])  // If you are rendering HTML columns, this is necessary
        ->make(true);
}

public function destroyi($id)
{
    $importer = Importer::find($id);

    if ($importer) {

        $importer->delete(); // This deletes the model instance
    }
    else{
    return redirect()->route('importers.index')->with('error', 'Importer not found');

    }

    return redirect()->route('importers.index')->with('success', 'Importer deleted successfully');
}


public function destroy($id)
{
    try {
        // Find the importer by ID
        $importer = Importer::find($id);

        // dd($importer);
        if ($importer) {
            $importer->destroy($id); // Deletes the importer
            return redirect()->route('importers.index')->with('success', 'Importer deleted successfully');
        }
        return redirect()->route('importers.index')->with('error', 'Importer not found');
    } catch (\Exception $e) {
        // Handle exception and log the error if needed
        \Log::error('Error deleting importer: '.$e->getMessage());

        return redirect()->route('importers.index')->with('error', 'An error occurred while trying to delete the importer.');
    }
}


}