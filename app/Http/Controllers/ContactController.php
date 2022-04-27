<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\ContactForm;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class ContactController extends Controller
{
    public function adminContact()
    {
        $contacts = Contact::latest()->paginate(5);
        return view('admin.contact.index', compact('contacts'));
    }

    public function addContact()
    {
        return view('admin.contact.create');
    }

    public function storeContact(Request $request)
    {
        $validatedData = $request->validate([
            'address' => 'required|min:4',
            'email' => 'required|email:rfc,dns',
            'phone' => 'required',
        ]);

        Contact::insert([
            'address' => $request->address,
            'email' => $request->email,
            'phone' => $request->phone,
            'created_at' => Carbon::now(),
        ]);

        return Redirect()->route('admin.contact')->with('success', 'Contact Inserted Successfully');
    }

    public function editContact($id)
    {
        $contact = Contact::find($id);
        return view('admin.contact.edit', compact('contact'));
    }

    public function updateContact(Request $request, $id)
    {
        $validatedData = $request->validate([
            'address' => 'required|min:4',
            'email' => 'required|email:rfc,dns',
            'phone' => 'required',
        ]);
        Contact::find($id)->update([
            'address' => $request->address,
            'email' => $request->email,
            'phone' => $request->phone,
            'updated_at' => Carbon::now(),
        ]);

        return Redirect()->route('admin.contact')->with('success', 'Contact Updated Successfully');
    }

    public function deleteContact($id)
    {
        Contact::find($id)->delete();
        return Redirect()->back()->with('success', 'Contact deleted Successfully');
    }

    public function contactPage(){
        $contact = DB::table('contacts')->first();
        return view('pages.contact', compact('contact'));
    }

    public function contactForm(Request $request){

        ContactForm::insert([
            'name' => $request->name,
            'email' => $request->email,
            'subject' => $request->subject,
            'message' => $request->message,
            'created_at' => Carbon::now(),
        ]);

        return Redirect()->route('contact')->with('success', 'Message sent Successfully');
    }

    public function adminMessage(){
        $messages = ContactForm::latest()->paginate(5);
        return view('admin.contact.message', compact('messages'));

    }

    public function deleteMessage($id){
        ContactForm::find($id)->delete();
        return Redirect()->back()->with('success', 'Message deleted Successfully');
    }
}
