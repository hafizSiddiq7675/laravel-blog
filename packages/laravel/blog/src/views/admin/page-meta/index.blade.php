@extends('admin.dashboard.app')
@section('content')

<div class="row">
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">@if(isset($page_metas['0']->page->name)) {{ $page_metas['0']->page->name }} @else Page @endif</h4>
            <p class="card-description">
                @if(isset($page_metas['0']->page->name)) {{ $page_metas['0']->page->name }} @endif Page Meta
            </p>
            <div class="table-responsive">
              <table class="table table-hover">
                <thead>
                  <tr>
                    <th>Page Name</th>
                    <th>Key</th>
                    <th>Value</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>

                    @foreach ($page_metas as $page_meta)
                    <tr>
                        <td>{{ $page_meta->page->name }}</td>
                        <td>{{ $page_meta->key }}</td>
                        <td>{{ substr($page_meta->value, 0, 80) }}</td>

                        <td width="20%">
                            <a href="javascript:0" class="btn btn-primary btn-sm page-meta-view" data-id={{ $page_meta->id }} >View</a>
                            <button href="javascript:0" class="btn btn-warning btn-sm page-meta-edit" data-id={{ $page_meta->id }}>Edit</button>
                            <button href="javascript:0" class="btn btn-danger btn-sm page-meta-delete" data-id={{ $page_meta->id }}>Delete</button>
                        </td>
                    </tr>
                    @endforeach



                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
</div>



@include('admin.page-meta.view')
@endsection
