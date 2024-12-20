@extends('layouts.frontend')
@section('content')
<div class="container mt-5">
    <div class="row">
      
        @foreach($categories as $category)

<!--Count items listed in each category-->
@php
$count = \App\Models\Inventory::where('category_id', $category->id)->count();
@endphp  
<div class="col-md-3 mb-3">
<div class="card">
    <div class="card-body">
        <h4> <a href="{{ route('frontend.categories.show', $category->id) }}"> {{ $category->name ?? '' }}</a></h4>
        <p class="card-text">Browse our available lists of {{ $category->name ?? '' }}</p>
    
    </div>
    <div class="card-footer text-muted">
        {{ $count ?? 'No Inventory' }}
    </div>
</div>
</div>
@endforeach

        </div>
    </div>
</div>
@endsection
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('category_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('frontend.categories.massDestroy') }}",
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
  let table = $('.datatable-Category:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection