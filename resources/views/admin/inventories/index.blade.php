@extends('layouts.admin')
@section('content')
@can('inventory_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.inventories.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.inventory.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.inventory.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-Inventory">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.inventory.fields.stock_number') }}
                        </th>
                        <th>
                            {{ trans('cruds.inventory.fields.year') }}
                        </th>
                        <th>
                            {{ trans('cruds.inventory.fields.category') }}
                        </th>
                        <th>
                            {{ trans('cruds.inventory.fields.featured_image') }}
                        </th>
                        <th>
                            {{ trans('cruds.inventory.fields.title') }}
                        </th>
                       <!-- <th>
                            {{ trans('cruds.inventory.fields.make') }}
                        </th>
                        <th>
                            {{ trans('cruds.inventory.fields.vehicle_model') }}
                        </th>-->
                        <th>
                            {{ trans('cruds.inventory.fields.featured') }}
                        </th>
                        <th>
                            {{ trans('cruds.inventory.fields.published') }}
                        </th>
                        <th>
                            {{ trans('cruds.inventory.fields.attachment') }}
                        </th>
                        <th>
                            {{ trans('cruds.inventory.fields.created_at') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($inventories as $key => $inventory)
                        <tr data-entry-id="{{ $inventory->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $inventory->stock_number ?? '' }}
                            <td>
                                {{ $inventory->year ?? '' }}
                            </td>
                            <td>
                                {{ $inventory->category->name ?? '' }}
                            </td>
                            <td>
                                @if($inventory->featured_image)
                                    <a href="{{ $inventory->featured_image->getUrl() }}" target="_blank" style="display: inline-block">
                                        <img src="{{ $inventory->featured_image->getUrl('thumb') }}">
                                    </a>
                                @endif
                            </td>
                            <td>
                                {{ $inventory->title ?? '' }}
                            </td>
                           <!-- <td>
                                {{ $inventory->make ?? '' }}
                            </td>
                            <td>
                                {{ $inventory->vehicle_model ?? '' }}
                            </td>-->
                            <td>
                                <span style="display:none">{{ $inventory->featured ?? '' }}</span>
                                <input type="checkbox" disabled="disabled" {{ $inventory->featured ? 'checked' : '' }}>
                            </td>
                            <td>
                                <span style="display:none">{{ $inventory->published ?? '' }}</span>
                                <input type="checkbox" disabled="disabled" {{ $inventory->published ? 'checked' : '' }}>
                            </td>
                          <!--  <td>
                                {{ $inventory->attachment ?? '' }}
                            </td>-->
                            <td>
                                {{ $inventory->created_at ?? '' }}
                            </td>
                            <td>
                                @can('inventory_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.inventories.show', $inventory->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('inventory_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.inventories.edit', $inventory->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('inventory_delete')
                                    <form action="{{ route('admin.inventories.destroy', $inventory->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="submit" class="btn btn-xs btn-danger" value="{{ trans('global.delete') }}">
                                    </form>
                                @endcan

                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>



@endsection
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('inventory_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.inventories.massDestroy') }}",
    className: 'btn-danger',
    action: function (e, dt, node, config) {
      var ids = $.map(dt.rows({ selected: true }).nodes(), function (entry) {
          return $(entry).data('entry-id')
      });

      if (ids.length === 0) {
        alert('{{ trans('global.datatables.zero_selected') }}')

        return
      }

      if (confirm('{{ trans('global.areYouSure') }}')) {
        $.ajax({
          headers: {'x-csrf-token': _token},
          method: 'POST',
          url: config.url,
          data: { ids: ids, _method: 'DELETE' }})
          .done(function () { location.reload() })
      }
    }
  }
  dtButtons.push(deleteButton)
@endcan

  $.extend(true, $.fn.dataTable.defaults, {
    orderCellsTop: true,
    order: [[ 1, 'desc' ]],
    pageLength: 100,
  });
  let table = $('.datatable-Inventory:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection