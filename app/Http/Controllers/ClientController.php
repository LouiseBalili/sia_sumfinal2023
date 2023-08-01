<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Mail;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return inertia('Loans/Index', [
            'clients' => Client::with('loans')->orderBy('issuance_date')->get()
        ]);
    }

    public function search($searchKey)
    {
        return inertia('Loans/Index', [
            'clients' => Client::where('fname', 'like', "%".$searchKey."%")
                                ->orWhere('lname', 'like', "%".$searchKey."%")
                                ->orWhere('address', 'like', "%".$searchKey."%")
                                ->orWhere('issuance_date', 'like', "%".$searchKey."%")
                                ->orWhere('active', 'like', "%".$searchKey."%")
                                ->get()
        ]);
    }

    public function toggleActive(Client $client)
    {
        $client->active = !$client->active;
        $client->save();
        return back()->banner('Client updated successfully!');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return inertia('Loans/Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $fields = $request->validate([
            'fname' => 'required|string',
            'lname' => 'required|string',
            'address' => 'required|string',
            'phone' => 'required|string',
            'email' => 'required|email|unique:clients',
            'initial_loan' => 'required|numeric',
            'issuance_date' => 'required|string'
        ]);

        $fileName = null;

        if($request->profile_pic) {
            $fileName = time().'.'.$request->profile_pic->extension();
            $request->profile_pic->move(public_path('images/client_profile_pics'), $fileName);
            $fields['profile_pic'] = $fileName;
        }

        Client::create($fields);

        return redirect('/loans')->banner('Client added successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Client $client)
    {
        $loans = $client->loans;

        return inertia('Loans/Show', [
            'client' => $client,
            'loans' => $loans
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Client $client)
    {
        return inertia('Loans/Edit', [
            'client' => $client
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Client $client)
    {
        $fields = $request->validate([
            'fname' => 'required|string',
            'lname' => 'required|string',
            'address' => 'required|string',
            'phone' => 'required|string',
            'email' => ['required', 'email', 'max:255', Rule::unique('clients')->ignore($client->id)],
            'initial_loan' => 'required|numeric',
            'issuance_date' => 'required|string'
        ]);

        $fileName = null;

        if($request->profile_pic) {
            $fileName = time().'.'.$request->profile_pic->extension();
            $request->profile_pic->move(public_path('images/client_profile_pics'), $fileName);
            $fields['profile_pic'] = $fileName;
        }

        $client->update($fields);

        return redirect('/loans')->banner('Client updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Client $client)
    {
        if(!$client->loans()->exists()) {
            $client->delete();
            return redirect('/loans')->banner('Client has been removed.');
        } else {
            return back()->dangerBanner('Unable to delete client.');
        }

    }

    public function send($client)
    {
        $client = Client::find($client);
        $email = $client->email;

        Mail::send('emails.sod', [], function($m) use ($email) {
            $m->to($email)->subject("Overdue Notice");
        });

        return back()->banner('Overdue Notice has been sent.');
    }
}
