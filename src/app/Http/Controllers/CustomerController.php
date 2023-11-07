<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;

class CustomerController extends Controller
{
    public function search(Request $request)
    {
        $query = Contact::query();

        if ($request->filled('fullname')) {
            $query->where('fullname', 'like', '%' . $request->input('fullname') . '%');
        }

        if ($request->filled('gender') && $request->input('gender') != 'all') {
            $query->where('gender', $request->input('gender'));
        }

        if ($request->filled('from')) {
            $query->where('created_at', '>=', $request->input('from'));
        }

        if ($request->filled('until')) {
            $query->where('created_at', '<=', $request->input('until'));
        }

        if ($request->filled('email')) {
            $query->where('email', 'like', '%' . $request->input('email') . '%');
        }

        $contacts = $query->Paginate(10);

        return view('customers', compact('contacts'));
    }

    public function destroy($id)
    {
        $contact = Contact::find($id);

        $contact->delete();

        return redirect('customers');
    }
}
