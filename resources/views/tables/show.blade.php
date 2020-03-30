@extends('layouts.app')

@section('title', '表格详情')

@section('content')
  <div class="row">
    <div class="col-md-9 col-lg-9">
      @if($cols->count())
      @csrf
        <table class="table table-bordered">
          <thead>
            <tr>
              @foreach($cols as $col)
              <th>{{ $col->name }}</th>
              @endforeach
              <th>操作</th>
            </tr>
          </thead>
          <tbody>
            @foreach($rows as $row)
            <tr>
              @foreach($cols as $col)
              <td>
                @switch($col->data_sort)
                  @case(1)
                    {{ $row->items->filter(function ($value, $key) use($col) { return $value->col_id == $col->id; })->first()->int_val }}
                    @break
                  @case(2)
                    {{ $row->items->filter(function ($value, $key) use($col) { return $value->col_id == $col->id; })->first()->float_val }}
                    @break
                  @case(3)
                    {{ $row->items->filter(function ($value, $key) use($col) { return $value->col_id == $col->id; })->first()->text_val }}
                    @break
                  @case(4)
                    {{ $row->items->filter(function ($value, $key) use($col) { return $value->col_id == $col->id; })->first()->date_val }}
                    @break
                  @default
                    {{ $row->items->filter(function ($value, $key) use($col) { return $value->col_id == $$col->id; })->first()->text_val }}
                @endswitch
              </td>
              @endforeach
              <td>
                <a href="#" style="color: inherit;">
                  <i class="fa fa-edit"></i>
                </a>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      @else
        <h3 class="text-xs-center alert alert-info">Empty!</h3>
      @endif
    </div>
    <div class="col-md-3 col-lg-3">
      @include('tables._sidebar')
    </div>
  </div>
@stop
