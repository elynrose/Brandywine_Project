<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyInventoryRequest;
use App\Http\Requests\StoreInventoryRequest;
use App\Http\Requests\UpdateInventoryRequest;
use App\Models\Category;
use App\Models\Inventory;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class InventoryController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('inventory_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $inventories = Inventory::with(['category', 'media'])->get();

        return view('admin.inventories.index', compact('inventories'));
    }

    public function create()
    {
        abort_if(Gate::denies('inventory_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $categories = Category::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.inventories.create', compact('categories'));
    }

    public function store(StoreInventoryRequest $request)
    {
        $inventory = Inventory::create($request->all());

        if ($request->input('featured_image', false)) {
            $inventory->addMedia(storage_path('tmp/uploads/' . basename($request->input('featured_image'))))->toMediaCollection('featured_image');
        }

        foreach ($request->input('photos', []) as $file) {
            $inventory->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('photos');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $inventory->id]);
        }

        return redirect()->route('admin.inventories.index');
    }

    public function edit(Inventory $inventory)
    {
        abort_if(Gate::denies('inventory_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $categories = Category::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $inventory->load('category');

        return view('admin.inventories.edit', compact('categories', 'inventory'));
    }

    public function update(UpdateInventoryRequest $request, Inventory $inventory)
    {
        $inventory->update($request->all());

        if ($request->input('featured_image', false)) {
            if (! $inventory->featured_image || $request->input('featured_image') !== $inventory->featured_image->file_name) {
                if ($inventory->featured_image) {
                    $inventory->featured_image->delete();
                }
                $inventory->addMedia(storage_path('tmp/uploads/' . basename($request->input('featured_image'))))->toMediaCollection('featured_image');
            }
        } elseif ($inventory->featured_image) {
            $inventory->featured_image->delete();
        }

        if (count($inventory->photos) > 0) {
            foreach ($inventory->photos as $media) {
                if (! in_array($media->file_name, $request->input('photos', []))) {
                    $media->delete();
                }
            }
        }
        $media = $inventory->photos->pluck('file_name')->toArray();
        foreach ($request->input('photos', []) as $file) {
            if (count($media) === 0 || ! in_array($file, $media)) {
                $inventory->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('photos');
            }
        }

        return redirect()->route('admin.inventories.index');
    }

    public function show(Inventory $inventory)
    {
        abort_if(Gate::denies('inventory_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $inventory->load('category');

        return view('admin.inventories.show', compact('inventory'));
    }

    public function destroy(Inventory $inventory)
    {
        abort_if(Gate::denies('inventory_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $inventory->delete();

        return back();
    }

    public function massDestroy(MassDestroyInventoryRequest $request)
    {
        $inventories = Inventory::find(request('ids'));

        foreach ($inventories as $inventory) {
            $inventory->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('inventory_create') && Gate::denies('inventory_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new Inventory();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
