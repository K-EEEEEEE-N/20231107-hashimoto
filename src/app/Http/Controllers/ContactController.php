<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ContactRequest;
use App\Models\Contact;

class ContactController extends Controller
{
    public function index()
    {
        return view('index');
    }

    public function confirm(ContactRequest $request)
    {
        $contact = $request->only(['last-name','first-name', 'gender', 'email', 'postcode', 'address', 'building_name', 'opinion']);
        return view('confirm', compact('contact'));
    }

    public function complete(ContactRequest $request)
    {
        if ($request->input('back') == 'back') {
            return redirect('/')
            ->withInput();
        }

        $lastName = $request->input('last-name');
        $firstName = $request->input('first-name');
        $fullName = $lastName . $firstName;
        $contact = new Contact();
        $contact->fullname = $fullName;

        $input = $request->only(['gender', 'email', 'postcode', 'address', 'building_name', 'opinion']);

        if ($input['gender'] === '男性') {
            $input['gender'] = 1;
        } elseif ($input['gender'] === '女性') {
            $input['gender'] = 2;
        }

        $contact = new Contact([
        'fullname' => $fullName,
        'gender' => $input['gender'],
        'email' => $input['email'],
        'postcode' => $input['postcode'],
        'address' => $input['address'],
        'building_name' => $input['building_name'],
        'opinion' => $input['opinion'],
        ]);

        $contact->save();

        return view('thanks');
    }
}
