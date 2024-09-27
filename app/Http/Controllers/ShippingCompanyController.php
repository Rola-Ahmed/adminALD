<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ShippingCompanies;
use Yajra\DataTables\Facades\DataTables;

class ShippingCompanyController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('shippingCompanies.index');
    }

    public function getShippingData(Request $request)
    {
        $shippingCompanies = ShippingCompanies::with('user')->get();
        
        return DataTables::of($shippingCompanies)
            ->addColumn('actions', function ($shippingCompany) {
                return '
                    <a href="#">
                        <i class="fas fa-fw fa-pen text-dark"></i>
                    </a>
                    <a href="#">
                        <i class="fas fa-fw fa-eye text-blue mx-2"></i>
                    </a>
                    <form action="'.route('shipping.delete', ['id' => $shippingCompany->id]).'" method="POST" style="display:inline;" onsubmit="return confirm(\'Are you sure?\');">
                        '.csrf_field().'
                        '.method_field('DELETE').'
                        <button type="submit" style="border: none; background: none; cursor: pointer;">
                            <i class="fas fa-fw fa-trash text-danger"></i>
                        </button>
                    </form>
                ';
            })
            ->editColumn('accountEmail', function($shippingCompany) {
                return $shippingCompany->user ? $shippingCompany->user->email : 'N/A';
            })
            ->editColumn('shippingCountires', function($shippingCompany) {
                return $shippingCompany->shippingCotunries ? implode(',', json_decode($shippingCompany->shippingCotunries)) : 'N/A';
            })
            ->rawColumns(['actions'])
            ->make(true);
    }




    public function destroy($id)
{
    try {
        $shipping = ShippingCompanies::find($id);

        if ($shipping) {
            $shipping->delete(); 
            return redirect()->route('all.shippingCompanies')->with('success', 'shipping company deleted successfully');
        }
        return redirect()->route('all.shippingCompanies')->with('error', 'shipping company not found');
    } catch (\Exception $e) {
        // Handle exception and log the error if needed
        \Log::error('Error deleting shipping company: '.$e->getMessage());

        return redirect()->route('all.shippingCompanies')->with('error', 'An error occurred while trying to delete the shipping company.');
    }
}
}
