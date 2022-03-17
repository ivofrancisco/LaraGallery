@extends('layouts.manage')

@section('content')
<!-- BEGIN: MAIN CONTENT
==================================================== -->
<div class="g-main-content">

    @include('partials.breadcrumbs')

    <!-- Begin: g-form-wrapper -->
    <div class="g-form-wrapper shadow-sm">
        <h4>{{ $title }}</h4>
        <!-- Begin: create-article-form -->
        <form action="/manage/galleries/{{ $task }}" class="g-create-edit-form g-cnt-form" method="POST" enctype="multipart/form-data">
            @csrf

            @if( $task == 'update' )
                @method('PUT')
                <input type="hidden" name="gallery_id" value="{{ $gallery->id }}">
            @endif

            <div class="form-group col-sm-12 col-md-12 @if( $task == 'create' ) s-uploads-wrapper @else s-photos-wrapper @endif" style="padding-left: 0;">

                @if( $task == 'update' )
                   @if ($gallery->photos)
                        @foreach( $gallery->photos as $photo)
                        <!-- Begin: g-uploader -->
                        <div class="g-uploader
                        loaded gallery shadow" style="margin-top: 24px; margin-bottom: 8px;">
                            <!-- Begin: g-manage-photo -->
                            <div class="g-manage-photo removable shadow-sm" style="background-color: #96bad0;">
                                <i class="icon-trash_02"></i>
                            </div>
                            <!-- End: g-manage-photo -->
                            <img src="/storage/images/{{ $photo }}" class="clickable shadow-sm" alt="upload image">
                            <input type="hidden" name="current_photos[]" value="{{ $photo }}">
                        </div>
                        <!-- End: g-uploader -->
                        @endforeach
                    @else
                    <p class="g-paragraph-2">There are no photos in this gallery.</p>
                   @endif
                @endif   

            </div>
            <!-- End: form-group -->

            <!-- Begin: form-group -->
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" name="title" class="form-control brd md" id="title" value="@if( $task == 'update') {{ $gallery->title ?? old('title') }} @endif">
                <small class="form-text text-danger">{!!$errors->first('title') !!}</small>
            </div>
            <!-- End: form-group -->

            <!-- Begin: form-group -->
            <div class="form-group">
                <label for="body">Description</label>
                <textarea name="body" class="form-control textarea brd mb-2" id="body">@if( $task == 'update') {{ $gallery->body ?? old('description') }} @endif</textarea>
                <small class="form-text text-danger">{!!$errors->first('body') !!}</small>
            </div>
            <!-- End: form-group -->

            <!-- Begin: form-group -->
            <div class="form-group col-sm-12 col-md-12 mt-4" style="padding-left: 0;">
                <label for="add-image2">Add Photos</label>
                <!-- Begin: s-uploads-wrapper -->
                <div id="s-uploads-wrapper">
                    <!-- Begin: g-uploader -->
                    <div class="g-uploader
                    loaded gallery" style="margin-bottom: 8px">
                        <img src="{{ asset('/storage/images/add_image.svg') }}" class="clickable" alt="upload image">
                        <input type="file" name="photos[]" class="photo empty" style="display: none">
                    </div>
                    <small class="form-text text-danger mb-1">{!!$errors->first('media') !!}</small>
                    <!-- End: g-uploader -->
                </div>
                <!-- End: s-uploads-wrapper -->
            </div>
            <!-- End: form-group -->

            <input type="submit" class="btn btn-primary bbm form-submit" value="@if( $task == 'update' ) Update @else Publish @endif">
        </form>
        <!-- End: create-article-form -->
    </div>
    <!-- End: g-form-wrapper -->
</div>
<!-- END: MAIN CONTENT -->
@endsection


@section('scripts')

    <script>
        // FIle uploader wrapper
        let uploads = document.querySelector("#s-uploads-wrapper"),
            // Image files manager 
            manager = new PhotoManager();

        // Opening file upload dialog box
        document.addEventListener('click', function(e){
            if (e.target.classList.contains('clickable')){
                manager.open(e);
            }
        });

        // Changing file information on
        // uploader element
        document.body.addEventListener("change", function (e) {
            if (e.target.classList.contains("empty")) {
                manager.replaceFile(e.srcElement);
                manager.addUploader(uploads);
            } else if (e.srcElement.classList.contains("photo")) {
                manager.replaceFile(e.srcElement);
            }
        });

        // Removing a specific photo from the DOM
        document.querySelectorAll('.removable').forEach(function(icon) {
            icon.addEventListener('click', function() {
                manager.removeFile(this, 'remove[]')
            });
        });
    </script>

@endsection



