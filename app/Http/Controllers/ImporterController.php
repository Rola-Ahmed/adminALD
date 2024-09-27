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
            // <a href="#" data-id="' . $importer->id . '" class="delete-importer">

    $importers = Importer::with('user')->get();
    return DataTables::of($importers)

        ->addColumn('actions', function ($importer) {
            return '
                <a href="#">
                    <i class="fas fa-fw fa-pen text-dark"></i>
                </a>
                <a href="#">
                    <i class="fas fa-fw fa-eye text-blue mx-2"></i>
                </a>
                <form action="'.route('importers.delete', ['id' => $importer->id]).'" method="POST" style="display:inline;" onsubmit="return confirm(\'Are you sure?\');">
                    '.csrf_field().'
                    '.method_field('DELETE').'
                    <button type="submit" style="border: none; background: none; cursor: pointer;">
                        <i class="fas fa-fw fa-trash text-danger"></i>
                    </button>
                </form>
            ';
        })
        

        ->editColumn('accountEmail', function($importer) {
            return $importer->user ? $importer->user->email : 'N/A'; // Accessing user email
        })
        ->rawColumns(['actions'])  // If you are rendering HTML columns, this is necessary
        ->make(true);
}




public function destroy($id)
{
    try {
        // Find the importer by ID
        $importer = Importer::find($id);

        // dd($importer);
        if ($importer) {
            $importer->delete(); // Deletes the importer
            return redirect()->route('all.importers')->with('success', 'Importer deleted successfully');
        }
        return redirect()->route('all.importers')->with('error', 'Importer not found');
    } catch (\Exception $e) {
        // Handle exception and log the error if needed
        \Log::error('Error deleting importer: '.$e->getMessage());

        return redirect()->route('all.importers')->with('error', 'An error occurred while trying to delete the importer.');
    }
}


}