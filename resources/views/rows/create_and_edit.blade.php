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
                <div class="form-group">
                  <label for="{{ 'col_'.$col->id }}">
                    {{ $col->name }}
                    @switch($col->data_sort)
                    @case(1)
                        （整数型）
                     @break
                    @case(2)
                        （浮点数型）
                     @break
                    @case(3)
                        （文本型）
                     @break
                    @case(4)
                        （日期型）
                     @break
                     @endswitch
                  </label>
                  <input type="text" class="form-control" name="{{ 'col_'.$col->id }}" id="{{ 'col_'.$col->id }}" value="" required>
                </div>
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
