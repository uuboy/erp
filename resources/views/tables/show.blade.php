@extends('layouts.app')

@section('title', '表格详情')

@section('content')
  <div class="row">
    <div class="col-md-10 col-lg-10 offset-md-1 offset-lg-1">
      @if($cols->count())
      <form action="{{ route('rows.store', $table->id) }}" method="POST" accept-charset="UTF-8">
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
            <tr>
              @foreach($cols as $col)
              <td>
                <input type="text" class="form-control" name="col_{{ $col->id }}" id="col_{{ $col->id }}">
              </td>
              @endforeach
              <td>
                <button class="btn btn-primary btn-sm fa fa-save" type="submit"></button>
              </td>
            </tr>
          </tbody>
        </table>
      </form>
      @else
        <h3 class="text-xs-center alert alert-info">Empty!</h3>
      @endif
    </div>
  </div>
@stop
