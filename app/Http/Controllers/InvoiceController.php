<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Invoice;
use App\Models\InvoiceItem;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class InvoiceController extends Controller
{
    // Affiche la liste des factures
    public function list_invoices_user()
    {
        $invoices = Invoice::where('user_id',Auth::user()->id)->orderByDesc('id')->get();
        return view('users.invoices.list_invoices', compact('invoices'));
    }

    // Affiche la liste des factures coté admin
    public function list_invoices_admin()
    {
        $invoices = Invoice::orderByDesc('id')->get();
        return view('admin.invoices.list_invoices', compact('invoices'));
    }

    // Enregistre une nouvelle facture
    public function store(Request $request)
    {
        // Validation des données
        $validator = Validator::make($request->all(), [
            'user_id' => 'required|exists:users,id',
            'status_id' => 'required|exists:statuses,id',
            'date_invoice' => 'required|date',
            'agregateur' => 'required|string',
            'amount' => 'required|integer',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Création de la facture
        $invoice = Invoice::create([
            'user_id' => $request->user_id,
            'status_id' => $request->status_id,
            'date_invoice' => $request->date_invoice,
            'agregateur' => $request->agregateur,
            'amount' => $request->amount,
        ]);

        return redirect()->route('invoices.index')->with('success', 'Invoice created successfully.');
    }

    // Affiche les détails d'une facture spécifique
    public function show_invoice($id)
    {
        $id = decrypt($id);
        try {
            $invoice = Invoice::findOrFail($id);
            $items = InvoiceItem::where('invoice_id',$invoice->id)->get();

            if( Auth::check()){
                if(Auth::user()->role == "admin"){
                    $view ='admin.invoices.show_invoice';
                }
                if(Auth::user()->role == "user"){
                    $view ='users.invoices.show_invoice';
                }
            }
            return view( $view, compact('invoice','items'));
        } catch (\Exception $e) {
           return back()->with('error',"Une erreur esy subvenue");
        }
    }

}
