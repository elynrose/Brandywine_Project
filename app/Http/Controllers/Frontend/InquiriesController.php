<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyInquiryRequest;
use App\Http\Requests\StoreInquiryRequest;
use App\Http\Requests\UpdateInquiryRequest;
use App\Models\Inquiry;
use App\Models\Inventory;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Http;



class InquiriesController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('inquiry_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $inquiries = Inquiry::with(['inventory'])->get();

        return view('frontend.inquiries.index', compact('inquiries'));
    }

    public function create()
    {

        $inventories = Inventory::pluck('year', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('frontend.inquiries.create', compact('inventories'));
    }


    public function save(Request $request)
    {
        //add validation
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required',
            'phone_number' => 'required',
            'comment' => 'required',
            'inventory_id' => 'required',
        ]);

        $request->validate([
            'recaptcha_token' => 'required',
        ]);
    
        $response = Http::asForm()->post('https://www.google.com/recaptcha/api/siteverify', [
            'secret' => config('captcha.secret'),
            'response' => $request->input('recaptcha_token'),
        ]);
    
        $recaptcha = $response->json();
    
        if (!$recaptcha['success'] || $recaptcha['score'] < 0.5) {
            return back()->withErrors(['recaptcha' => 'reCAPTCHA verification failed.']);
        }

        $inquiry = Inquiry::create($request->all());

        return redirect()->route('frontend.inventories.show', $request->inventory_id)->with('success', 'Inquiry saved successfully.');

    }

    

    public function store(StoreInquiryRequest $request)
    {
        $inquiry = Inquiry::create($request->all());

        return redirect()->route('frontend.inquiries.show', $request->inventory_id);

    }

    public function edit(Inquiry $inquiry)
    {
        abort_if(Gate::denies('inquiry_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $inventories = Inventory::pluck('year', 'id')->prepend(trans('global.pleaseSelect'), '');

        $inquiry->load('inventory');

        return view('frontend.inquiries.edit', compact('inquiry', 'inventories'));
    }

    public function update(UpdateInquiryRequest $request, Inquiry $inquiry)
    {
        $inquiry->update($request->all());

        return redirect()->route('frontend.inquiries.index');
    }

    public function show(Inquiry $inquiry)
    {
        $inquiry->load('inventory');

        return view('frontend.inquiries.show', compact('inquiry'));
    }

    public function destroy(Inquiry $inquiry)
    {
        abort_if(Gate::denies('inquiry_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $inquiry->delete();

        return back();
    }

    public function massDestroy(MassDestroyInquiryRequest $request)
    {
        $inquiries = Inquiry::find(request('ids'));

        foreach ($inquiries as $inquiry) {
            $inquiry->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
