<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyMenuRequest;
use App\Http\Requests\StoreMenuRequest;
use App\Http\Requests\UpdateMenuRequest;
use App\Models\ContentPage;
use App\Models\Menu;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class MenuController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('menu_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $menus = Menu::with(['parent', 'page'])->get();

        return view('admin.menus.index', compact('menus'));
    }

    public function create()
    {
        abort_if(Gate::denies('menu_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $parents = Menu::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $pages = ContentPage::pluck('title', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.menus.create', compact('pages', 'parents'));
    }

    public function store(StoreMenuRequest $request)
    {
        $menu = Menu::create($request->all());

        return redirect()->route('admin.menus.index');
    }

    public function edit(Menu $menu)
    {
        abort_if(Gate::denies('menu_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $parents = Menu::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $pages = ContentPage::pluck('title', 'id')->prepend(trans('global.pleaseSelect'), '');

        $menu->load('parent', 'page');

        return view('admin.menus.edit', compact('menu', 'pages', 'parents'));
    }

    public function update(UpdateMenuRequest $request, Menu $menu)
    {
        $menu->update($request->all());

        return redirect()->route('admin.menus.index');
    }

    public function show(Menu $menu)
    {
        abort_if(Gate::denies('menu_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $menu->load('parent', 'page');

        return view('admin.menus.show', compact('menu'));
    }

    public function destroy(Menu $menu)
    {
        abort_if(Gate::denies('menu_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $menu->delete();

        return back();
    }

    public function massDestroy(MassDestroyMenuRequest $request)
    {
        $menus = Menu::find(request('ids'));

        foreach ($menus as $menu) {
            $menu->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}