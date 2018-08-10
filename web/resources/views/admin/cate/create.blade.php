@extends('admin.layout.index')

<!-- 在占位符中填充内容 -->
@section('container')
@if (count($errors) > 0)
    <div class="mws-form-message error">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif


<div class="mws-panel grid_8">
    <div class="mws-panel-header">
        <span>{{ $title }}</span>
    </div>
    <div class="mws-panel-body no-padding">
        <form class="mws-form" action="/admin/cate" method="post">
            {{ csrf_field() }}
            <div class="mws-form-inline">
                
                <div class="mws-form-row">
                    <label class="mws-form-label">分类名称</label>
                    <div class="mws-form-item">
                        <input type="text" name="tname" value="" class="small">
                    </div>
                </div>

                <div class="mws-form-row">
                    <label class="mws-form-label">所属类别</label>
                    <div class="mws-form-item">
                       	<select name="pid" id="" class="small">
                       		<option value="0"> -- 请选择 --  </option>	
                       	</select>
                    </div>
                </div>
                
            <div class="mws-button-row">
                <input type="submit" value="提交" class="btn btn-info">
                <input type="reset" value="重置" class="btn btn-success">
            </div>
        </form>
    </div>      
</div>



@endsection