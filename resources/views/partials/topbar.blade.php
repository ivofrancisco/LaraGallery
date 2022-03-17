<!-- BEGIN: TOPBAR
    ==================================================== -->
<div class="topbar">
    <!-- BEGIN: HEADER
    ==================================================== -->
    <div class="g-header">
        <!-- BEGIN: WRAPPER
        ==================================================== -->
        <div class="g-wrapper">
            <!-- Begin: g-header-brand -->
            <img src="/storage/images/gallery-logo.svg" class="g-header-brand" alt="company logo">
            <!-- End: g-header-brand -->

            <!-- Begin: g-header-nav -->
            <div class="g-header-nav">
                
            </div>
            <!-- End: g-header-nav -->
        </div>
        <!-- END: WRAPPER -->
    </div>
    <!-- END: HEADER -->

    <!-- BEGIN: NAVBAR
    ==================================================== -->
    <div class="g-navbar">
        <!-- BEGIN: WRAPPER
        ==================================================== -->
        <div class="g-wrapper">
            <ul>
                <li class="g-nav-item {{ Request::is('/') ? 'active' : ''}}">
                    <a href="/">Galleries</a>
                </li>
                <li class="g-nav-item {{ Request::is('/manage/galleries/create') ? 'active' : ''}}">
                    <a href="/manage/galleries/create">Create Gallery</a>
                </li>
            </ul>
        </div>
        <!-- END: WRAPPER -->
    </div>
    <!-- END: NAVBAR -->
</div>
<!-- END: TOPBAR -->
