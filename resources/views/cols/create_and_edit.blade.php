@extends('layouts.app')

@section('title', '新建/编辑列')

@section('content')
  <div class="container">
    <div class="col-md-10 col-lg-10 offset-md-1 offset-lg-1">
      <div class="card">
        <div class="card-header">
          <h3>
            <i class="fa fa-edit mr-2"></i>
            @if($col->id)
              编辑列
            @else
              新建列
            @endif
          </h3>
        </div>
        <div class="card-body">
          @if($col->id)
            <form action="{{ route('cols.update', [$table->id, $col->id]) }}" accept-charset="UTF-8" method="POST">
              @method('PUT')
          @else
            <form action="{{ route('cols.store', $table->id) }}" accept-charset="UTF-8" method="POST">
          @endif
            @csrf
            <div class="form-group text-center">
              <h5>表格名称：{{ $table->name }}</h5>
              <small>标识：{{ $table->tag }}</small>
            </div>
            <div class="form-group form-inline">
              <div class="form-group col-md-4">
                <label for="name" class="col-md-4">列名称:</label>
                <input type="text" class="form-control col-md-8" placeholder="填写列名称" name="name" id="name" value="{{ old('name', $col->name) }}" required>
              </div>
              <div class="form-group col-md-4">
                <label for="tag" class="col-md-4">列标识:</label>
                <input type="text" class="form-control col-md-8" placeholder="填写列标识（唯一）" name="tag" id="tag" value="{{ old('tag', $col->tag) }}" required>
              </div>
              <div class="form-group col-md-4">
                <select name="data_sort" id="data_sort" class="form-control col-md-12" required>
                  <option value="" hidden disabled selected >请选择数据类型</option>
                  <option value="1" {{ $col->data_sort === 1 ? 'selected' : '' }}>整数型</option>
                  <option value="2" {{ $col->data_sort === 2 ? 'selected' : '' }}>浮点数型</option>
                  <option value="3" {{ $col->data_sort === 3 ? 'selected' : '' }}>文本型</option>
                  <option value="4" {{ $col->data_sort === 4 ? 'selected' : '' }}>日期</option>
                </select>
              </div>
            </div>

            <div class="form-group mt-4 text-center">
              <button class="btn btn-primary" type="submit">提交</button>
            </div>
            </form>
        </div>
      </div>
    </div>
  </div>
@stop
