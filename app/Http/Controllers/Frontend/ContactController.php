<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyContactRequest;
use App\Http\Requests\StoreContactRequest;
use App\Http\Requests\UpdateContactRequest;
use App\Models\Contact;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Http;


class ContactController extends Controller
{
    public function index()
    {

        $contacts = Contact::all();

        return view('frontend.contacts.index', compact('contacts'));
    }

    public function create()
    {
        return view('frontend.contacts.create');
    }


    public function store(StoreContactRequest $request)
    {
        
        $request->validate([
            'recaptcha_token' => 'required',
        ]);

        if (!empty($request->pot)) {
            // This contact message is a spam, do not store it
            \Log::info('Spam contact message detected', [
                'message' => $request->input('message'),
                'ip' => $request->ip(),
            ]);

            die();
        }

    
        $response = Http::asForm()->post('https://www.google.com/recaptcha/api/siteverify', [
            'secret' => config('captcha.secret'),
            'response' => $request->input('recaptcha_token'),
        ]);
    
        $recaptcha = $response->json();
    
        if (!$recaptcha['success'] || $recaptcha['score'] < 0.5) {
            return back()->withErrors(['recaptcha' => 'reCAPTCHA verification failed.']);
        }
    
        $contact = Contact::create($request->all());

      //  return view('home')->with('message', 'Your message has been sent. We will get back to you shortly.');
    }


    public function saveContact(Request $request)
    {
      
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'message' => 'required',
            'g-recaptcha-response' => 'required|captcha',
    ]);

    if ($validator->fails()) {
        return redirect()->back()->withErrors($validator)->withInput();
    }

        if (!empty($request->pot)) {
            // This contact message is a spam, do not store it
            \Log::channel('contact')->info('Spam contact message detected', [
                'message' => $request->input('message'),
                'ip' => $request->ip(),
            ]);

            return back();
        }

        $contact = Contact::create($request->all());

        return redirect()->route('frontend.contacts.create')->with('message', 'Your message has been sent. We will get back to you shortly.');
        
    }

    public function edit(Contact $contact)
    {
        abort_if(Gate::denies('contact_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('frontend.contacts.edit', compact('contact'));
    }

    public function update(UpdateContactRequest $request, Contact $contact)
    {
        $contact->update($request->all());

        return redirect()->route('frontend.contacts.index');
    }

    public function show(Contact $contact)
    {
        abort_if(Gate::denies('contact_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('frontend.contacts.show', compact('contact'));
    }

    public function destroy(Contact $contact)
    {
        abort_if(Gate::denies('contact_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $contact->delete();

        return back();
    }

    public function massDestroy(MassDestroyContactRequest $request)
    {
        $contacts = Contact::find(request('ids'));

        foreach ($contacts as $contact) {
            $contact->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
