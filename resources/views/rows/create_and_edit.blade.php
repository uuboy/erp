@extends('layouts.app')

@section('title', '插入记录')

@section('content')
  <div class="container">
    <div class="col-md-10 col-lg-10 offset-md-1 offset-lg-1">
      <div class="card">
        <div class="card-header">
          <h3>
            <i class="fa fa-edit mr-2"></i>
            @if($row->id)
              编辑记录
            @else
              新建记录
            @endif
          </h3>
        </div>
        <div class="card-body">
          @if($row->id)
            <form action="{{ route('rows.update', [$table->id, $row->id]) }}" accept-charset="UTF-8" method="POST">
              @method('PUT')
          @else
            <form action="{{ route('rows.store', $table->id) }}" accept-charset="UTF-8" method="POST">
          @endif
              @csrf
              <div class="form-group">
              @foreach($cols as $col)
                @switch($col->data_sort)
                  @case(1)
                    <div class="form-group">
                      <label for="{{ 'col_'.$col->id }}">
                        {{ $col->name }}:整数型
                      </label>
                      <input type="text" class="form-control" name="{{ 'col_'.$col->id }}" id="{{ 'col_'.$col->id }}" value="{{ old($i++, $row->items->filter(function ($value, $key) use($col) { return $value->col_id == $col->id; })->first()->int_val) }}">
                    </div>
                   @break
                  @case(2)
                    <div class="form-group">
                      <label for="{{ 'col_'.$col->id }}">
                        {{ $col->name }}:浮点型
                      </label>
                      <input type="text" class="form-control" name="{{ 'col_'.$col->id }}" id="{{ 'col_'.$col->id }}" value="{{ old($i++, $row->items->filter(function ($value, $key) use($col) { return $value->col_id == $col->id; })->first()->float_val) }}">
                    </div>
                   @break
                  @case(3)
                    <div class="form-group">
                      <label for="{{ 'col_'.$col->id }}">
                        {{ $col->name }}:文本型
                      </label>
                      <input type="text" class="form-control" name="{{ 'col_'.$col->id }}" id="{{ 'col_'.$col->id }}" value="{{ old($i++, $row->items->filter(function ($value, $key) use($col) { return $value->col_id == $col->id; })->first()->text_val) }}">
                    </div>
                   @break
                  @case(4)
                    <div class="form-group">
                      <label for="{{ 'col_'.$col->id }}">
                        {{ $col->name }}:日期型
                      </label>
                      <input type="text" class="form-control" name="{{ 'col_'.$col->id }}" id="{{ 'col_'.$col->id }}" value="{{ old($i++, $row->items->filter(function ($value, $key) use($col) { return $value->col_id == $col->id; })->first()->date_val) }}">
                    </div>
                   @break
                @endswitch

              @endforeach
              </div>
              <div class="form-group text-center mt-4">
                <button class="btn btn-primary" type="submit">提交</button>
              </div>
            </form>
        </div>
      </div>

    </div>
  </div>
@stop
