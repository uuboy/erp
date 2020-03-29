@extends('layouts.app')

@section('title', '表格模板列表')

@section('content')
  <div class="row">
    <div class="col-md-9 col-lg-9">
      @if($tables->count())
      <div class="table-responsive-sm">
        <table class="table table-hover">
          <thead class="thead-light">
            <tr>
              <th>名称</th>
              <th>标识符</th>
              <th>操作</th>
            </tr>
          </thead>
          <tbody>
            @foreach($tables as $table)
            <tr>
              <td>
                <a href="{{ route('tables.show', $table->id) }}">{{ $table->name }}</a>
              </td>
              <td>
                <a href="{{ route('tables.show', $table->id) }}">{{ $table->tag }}</a>
              </td>
              <td>
                <span>
                  <a href="{{ route('tables.edit', $table->id) }}"><i class="fa fa-edit mr-2"></i></a>
                  <a href=""><i class="fa fa-trash"></i></a>
                </span>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
      {!! $tables->links() !!}
      @else
        <h3 class="text-xs-center alert alert-info">Empty!</h3>
      @endif

    </div>

    <div class="col-md-3 col-lg-3 sidebar">
      @include('tables._sidebar')
    </div>

  </div>
@stop
