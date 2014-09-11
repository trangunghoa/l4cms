@extends('backend/layouts/default')

{{-- Page title --}}
@section('title')
Category Management ::
@parent
@stop

{{-- Page content --}}
@section('content')
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Category Management
            <a href="{{ route('create/category') }}" class="btn btn-outline btn-primary btn-xs"><i class="fa fa-plus"></i> Create</a>
        </h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- /.row -->
<div class="table-responsive">
    <table class="table table-bordered table-hover">
        <thead>
            <tr>
                <th >Id</th>
                <th >Name</th>		
                <th >Menu position</th>
                <th >Homepage position</th>
                <th >Status</th>
                <th >@lang('table.actions')</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($categories as $category)
            @if($category->parent_id == 0)
            <tr>
                <td>{{ $category->id }}</td>
                <td><strong>{{ $category->name }}</strong></td>
                <td>{{ $category->showon_menu }}</td>
                <td>{{ $category->showon_homepage }}</td>
                <td>{{ $category->status }}</td>
                <td>
                    @if ( Sentry::getUser()->hasAnyAccess(['news','news.editcategory']) )
                    <a href="{{ route('update/category', $category->id) }}" class="btn btn-default btn-xs">@lang('button.edit')</a>
                    @endif
                </td>
            </tr>
            @foreach ($category->subscategories as $subcate)						
            <tr>
                <td>{{ $subcate->id }}</td>
                <td> - - {{ $subcate->name }}</td>
                <td>{{ $subcate->showon_menu }}</td>
                <td>{{ $subcate->showon_homepage }}</td>
                <td>{{ $subcate->status }}</td>
                <td>
                    @if ( Sentry::getUser()->hasAnyAccess(['news','news.editcategory']) )
                    <a href="{{ route('update/category', $category->id) }}" class="btn btn-default btn-xs">@lang('button.edit')</a>
                    @endif
                </td>
            </tr>
            @endforeach
            @endif
            @endforeach
        </tbody>
    </table>
</div>
@stop
