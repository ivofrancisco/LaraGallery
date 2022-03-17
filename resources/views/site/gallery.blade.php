@extends('layouts.site')

    <!-- BEGIN: GALLERY PAGE
    ==================================================== -->
    <div id="p-gallery">
        <!-- Begin: g-container-2 -->
        <div class="g-container-2">

            <!-- BEGIN: ALPHA GALLERY
            ==================================================== -->
            <div id="alpha-gallery" class="gallery">

                <!-- BEGIN: GALLERY PREVIEW
                ==================================================== -->
                <div id="s-gallery-preview">

                    @if ($gallery)
                        @if ($gallery->photos)
                            @foreach($gallery->photos as $photo)
                            <!-- Begin: s-preview-item -->
                            <div class="s-preview-item" onclick="openModal(this)">
                                <img src="/storage/images/{{ $photo }}" alt="LaraGallery" class="shadow-sm">
                                <i class="icon-search_02 s-preview-icon"></i>
                            </div>
                            <!-- End: s-preview-item -->
                            @endforeach
                        @else
                            <h3>There are photos to display from this gallery.</h3>
                            <a href="/manage/galleries/{{ $gallery->id }}/edit">Edit Gallery</a>
                        @endif   
                    @else
                            <h3>There is no gallery to display yet.</h3>
                            <a href="{{ route('manage.create') }}">Create Gallery</a>
                    @endif
                    <a href="/manage/galleries/{{ $gallery->id }}/edit">Edit Gallery</a>
                </div>
                <!-- END: GALLERY PREVIEW -->

                <!-- BEGIN: GALLERY MODAL
                ==================================================== -->
                <div id="s-gallery-modal">

                    <!-- BEGIN: MODAL NAVIGATION
                    ==================================================== -->
                    <div id="s-modal-navigation">
                        <!-- Begin: Close Button -->
                        <div class="s-close-btn" onclick="closeModal()">
                            <i class="icon-close"></i>
                        </div>
                        <!-- End: Close Button -->
                        <!-- Begin: s-slr-arrows -->
                        <div id="s-slr-arrows">
                            <div class="s-arrow prev">
                                <i class="icon-left-chevron_02" onclick="moveSlider(-1)"></i>
                            </div>
                            <div class="s-arrow next">
                                <i class="icon-right-chevron_02" onclick="moveSlider(1)"></i>
                            </div>
                        </div>
                        <!-- End: s-slr-arrows -->
                    </div>
                    <!-- END: MODAL NAVIGATION -->

                    <!-- BEGIN: MODAL CONTENT
                    ==================================================== -->
                    <div id="s-modal-content">

                        @if ($gallery->photos)
                            @foreach($gallery->photos as $photo)
		                    <!-- Begin: s-slide -->
	                        <div class="s-slide">
	                            <img src="/storage/images/{{ $photo }}" alt="LaraGallery" class="shadow-sm">
	                            <div class="s-slide-overlay"></div>
	                        </div>
	                        <!-- End: s-slide -->
	                	    @endforeach
                        @endif

                    </div>
                    <!-- END: MODAL CONTENT -->

                </div>
                <!-- END: GALLERY MODAL -->

            </div>
            <!-- END: ALPHA GALLERY -->
        </div>
        <!-- End: g-container-2 -->
    </div>
    <!-- END: GALLERY -->