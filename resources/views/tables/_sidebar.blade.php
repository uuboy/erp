<div class="card ">
  <div class="card-body">
    @if(if_route('tables.index'))
    <a href="{{ route('tables.create') }}" class="btn btn-success btn-block" aria-label="Left Align">
      <i class="fa fa-pencil-alt mr-2"></i> 新建表格模板
    </a>
    @endif
    @if(if_route('tables.show'))
      <a href="{{ route('cols.create', $table->id) }}" class="btn btn-success btn-block" aria-label="Left Align">
      <i class="fa fa-pencil-alt mr-2"></i> 插入新的列
    </a>
    @endif
    @if(if_route('tables.show'))
      <a href="{{ route('rows.create', $table->id) }}" class="btn btn-success btn-block" aria-label="Left Align">
      <i class="fa fa-pencil-alt mr-2"></i> 插入新的行
    </a>
    @endif
  </div>
</div>
