<div class="card ">
  <div class="card-body">
    <a href="{{ route('tables.create') }}" class="btn btn-success btn-block" aria-label="Left Align">
      <i class="fa fa-pencil-alt mr-2"></i> 新建表格模板
    </a>
    @if($table->id)
      <a href="{{ route('rows.create', $table->id) }}" class="btn btn-success btn-block" aria-label="Left Align">
      <i class="fa fa-pencil-alt mr-2"></i> 插入新的记录
    </a>
    @endif
  </div>
</div>
