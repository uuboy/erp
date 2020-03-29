@extends('layouts.app')

@section('title','新建/编辑表格模板')

@section('content')
  <div class="container">
    <div class="col-md-10 col-lg-10 offset-md-1 offset-lg-1">
      <div class="card">
        <div class="card-header">
          <h3>
            <i class="fa fa-edit mr-2"></i>
            @if($table->id)
              编辑表格模板
            @else
              新建表格模板
            @endif
          </h3>
        </div>
        <div class="card-body">
          @if($table->id)
            <form action="{{ route('tables.update', $table->id) }}" method="POST" accept-charset="UTF-8">
              @method('PUT')
          @else
            <form action="{{ route('tables.store') }}" method="POST" accept-charset="UTF-8">
          @endif
              @csrf
              @include('shared._error')
              <div class="form-group form-inline mt-4">
                <div class="form-group col-md-6">
                  <label for="name" class="col-md-4">表格名称:</label>
                  <input type="text" class="form-control col-md-8" name="name" id="name" value="{{ old('name', $table->name) }}" placeholder="填写表格的名称" required>
                </div>
                <div class="form-group col-md-6">
                  <label for="name" class="col-md-4">表格标识:</label>
                  <input type="text" class="form-control col-md-8" name="tag" id="tag" value="{{ old('name', $table->tag) }}" placeholder="填写表格的标识(唯一）" required>
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
