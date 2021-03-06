@extends('admin.layout.index')

<!-- 在占位符中填充内容 -->
@section('container')

<div class="mws-panel grid_8">
    <div class="mws-panel-header">
        <span><i class="icon-table"></i>管理员列表</span>
    </div>
  <div class="mws-panel-body no-padding">
   <div id="DataTables_Table_1_wrapper" class="dataTables_wrapper" role="grid">
    <div id="DataTables_Table_1_length" class="dataTables_length">
        <form action="/admin/user" method="get">
            <label>显示
                <select size="1" name="count" aria-controls="DataTables_Table_1">
                  <option value="5" @if(!empty($request['count']) && isset($request['count']) && $request['count'] == 5) selected @endif>5</option>
                  <option value="10" @if(!empty($request['count']) && isset($request['count']) && $request['count'] == 10) selected @endif>10</option>
                  <option value="15" @if(!empty($request['count']) && isset($request['count']) && $request['count'] == 15) selected @endif>15</option>
                </select>页
          </label>
        </div>
        <div class="dataTables_filter" id="DataTables_Table_1_filter">
          <label>搜索:
            <input type="text" name="search" aria-controls="DataTables_Table_1" value="{{ $request['search'] or ''}}">
          </label>
            <input type="submit" value="搜索" class="btn">
        </div>
    </form>
    <table class="mws-datatable-fn mws-table dataTable" id="DataTables_Table_1" aria-describedby="DataTables_Table_1_info">
      <thead>
        <tr role="row">
          <th>ID</th>
          <th>用户名</th>
          <th>电话</th>
          <th>权限</th>
          <th>操作</th>
        </tr>
      </thead>
      <tbody role="alert" aria-live="polite" aria-relevant="all">
        @foreach($data as $k=>$v)
        <tr class="odd">
            <td>{{ $v -> id}}</td>
            <td>{{ $v -> nickname}}</td>
            <td>{{ $v -> tel}}</td>
            @if ($v -> power == 1)
                <td>超级管理员</td>
            @elseif ($v -> power == 2)
                <td>普通管理员</td>
            @endif
            <td>
                <a href="/admin/user/{{ $v->id }}/edit" class="btn">修改</a>
                <form action="/admin/user/{{ $v->id }}" method="post" style="display: inline;">
                    {{ csrf_field() }}
                    {{ method_field('DELETE') }}
                    <input type="submit" value="删除" class="btn">
                </form>
            </td>
        </tr>
        @endforeach
      </tbody>
    </table>
      <div id="page_page">
          {!! $data->appends($request)->render() !!}
      </div>
      
  </div>
</div>
</div>
@endsection