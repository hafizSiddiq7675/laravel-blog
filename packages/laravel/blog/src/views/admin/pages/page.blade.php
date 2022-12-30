@extends('blog::admin.dashboard.app')
@section('content')

        <div class="row">
            <div class="col-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        @if (\Session::has('success'))
                        <div class="alert alert-primary alert-dismissible" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <strong>Success ! </strong> {!! \Session::get('success') !!}
                            @php
                                Session::forget('success')
                            @endphp
                        </div>
                    @endif
                    <h4 class="card-title">{{ $page->name }}</h4>

                    <form class="forms-sample" action="{{ route('page-update') }}" method="post">
                        @csrf
                        <div class="row">
                            <input type="hidden" name="page_id" class="form-control" id="exampleInputName1" placeholder="Name" value="{{ $page->id }}">

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputName1">Name</label>
                                    <input type="text" name="name" class="form-control" id="exampleInputName1" placeholder="Name" value="{{ $page->name }}">
                                    @if ($errors->has('name'))
                                    <span class="text-danger">{{ $errors->first('name') }}</span>
                                    @endif
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputName1">Title</label>
                                    <input type="text" name="title" class="form-control" id="exampleInputName1" placeholder="Title" value="{{ $page->title }}">
                                    @if ($errors->has('title'))
                                    <span class="text-danger">{{ $errors->first('title') }}</span>
                                    @endif
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputName1">Slug</label>
                                    <input readonly type="text" name="slug" class="form-control" id="exampleInputName1" placeholder="Slug" value="{{ $page->slug }}">
                                    @if ($errors->has('slug'))
                                    <span class="text-danger">{{ $errors->first('slug') }}</span>
                                    @endif
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputName1">Meta Keywords</label>
                                    <input type="text" name="meta_keywords" class="form-control" id="exampleInputName1" placeholder="Meta Keywords" value="{{ $page->meta_keywords }}">
                                    @if ($errors->has('meta_keywords'))
                                    <span class="text-danger">{{ $errors->first('meta_keywords') }}</span>
                                    @endif
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="exampleFormControlTextarea3">Meta Description</label>
                                    <textarea name="meta_description" class="form-control" id="exampleFormControlTextarea3" rows="7">{{ $page->meta_description }}</textarea>
                                    @if ($errors->has('meta_description'))
                                    <span class="text-danger">{{ $errors->first('meta_description') }}</span>
                                    @endif
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputName1">Page Main Title</label>
                                    <input type="text" name="page_main_title" class="form-control" id="exampleInputName1" placeholder="Meta Keywords" value="{{ $page_meta['page_main_title']->value }}">
                                    @if ($errors->has('page_main_title'))
                                    <span class="text-danger">{{ $errors->first('page_main_title') }}</span>
                                    @endif
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputName1">Page Main Description</label>
                                    <input type="text" name="page_main_desc" class="form-control" id="exampleInputName1" placeholder="Meta Keywords" value="{{ $page_meta['page_main_desc']->value }}">
                                    @if ($errors->has('page_main_desc'))
                                    <span class="text-danger">{{ $errors->first('page_main_desc') }}</span>
                                    @endif
                                </div>
                            </div>




                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="exampleFormControlTextarea3">Page Article</label>
                                    <textarea name="page_article" class="form-control" id="page_article" rows="7">{{ $page_meta['page_article']->value }}</textarea>
                                    @if ($errors->has('page_article'))
                                    <span class="text-danger">{{ $errors->first('page_article') }}</span>
                                    @endif
                                </div>
                            </div>

                        </div>



                        <button type="submit" class="btn btn-primary mr-2">Update</button>
                    </form>
                    </div>
                </div>
            </div>
        </div>

<script src="https://cdn.ckeditor.com/4.12.1/standard/ckeditor.js"></script>
<script>
    $(document).ready(function() {


        CKEDITOR.replace('page_article', {
            filebrowserUploadUrl: "{{route('pages.uploadImage', ['_token' => csrf_token() ])}}",
            filebrowserUploadMethod: 'form'
        });
    });
</script>
@endsection
