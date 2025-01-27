<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyInquiryRequest;
use App\Http\Requests\StoreInquiryRequest;
use App\Http\Requests\UpdateInquiryRequest;
use App\Models\Inquiry;
use App\Models\Inventory;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class InquiriesController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('inquiry_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $inquiries = Inquiry::with(['inventory'])->get();

        return view('admin.inquiries.index', compact('inquiries'));
    }

    public function create()
    {
        abort_if(Gate::denies('inquiry_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $inventories = Inventory::pluck('year', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.inquiries.create', compact('inventories'));
    }

    public function store(StoreInquiryRequest $request)
    {
        $inquiry = Inquiry::create($request->all());

        return redirect()->route('admin.inquiries.index');
    }

    public function edit(Inquiry $inquiry)
    {
        abort_if(Gate::denies('inquiry_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $inventories = Inventory::pluck('year', 'id')->prepend(trans('global.pleaseSelect'), '');

        $inquiry->load('inventory');

        return view('admin.inquiries.edit', compact('inquiry', 'inventories'));
    }

    public function update(UpdateInquiryRequest $request, Inquiry $inquiry)
    {
        $inquiry->update($request->all());

        return redirect()->route('admin.inquiries.index');
    }

    public function show(Inquiry $inquiry)
    {
        abort_if(Gate::denies('inquiry_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $inquiry->load('inventory');

        return view('admin.inquiries.show', compact('inquiry'));
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
