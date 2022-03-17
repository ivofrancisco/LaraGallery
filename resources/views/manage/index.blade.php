@extends('layouts.manage')

    @section('content')
    <!-- BEGIN: MAIN CONTENT
    ==================================================== -->
    <div class="g-main-content">

    @include('partials.breadcrumbs')

    <!-- BEGIN: CONTENT
    ==================================================== -->
        <div id="s-articles-list" class="g-content card sm-card shadow-sm">

            @include('partials.alerts')
            
            <!-- Begin: card-header -->
            <div class="card-header border-0 py-3">
            @isset($message_success)
                <div class="container">
                    <div class="alert alert-success" role="alert">
                        {!!$message_success!!}
                    </div>
                </div>
            @endisset
            <!-- Begin: card-title -->
                <div class="card-title">
                    <h4 class="card-label">{{ $title }}</h4>
                    <span class="mt-3">List of all {{ $title }}</span>
                </div>
                <!-- End: card-title -->
                <!-- Begin: card-toolbar -->
                <div class="card-toolbar">
                    <a href="{{ route('manage.create') }}" class="btn btn-mini info">
                        <i class="icon-plus"></i>
                    </a>
                </div>
                <!-- End: card-toolbar -->
            </div>
            <!-- End: card-header -->
            <!-- Begin: card-body -->
            <div class="card-body py-0">
                <!-- Begin: table g-table -->
                <table class="table g-table">
                    <!-- Begin: g-table-head -->
                    <thead class="g-table-head">
                    <!-- Begin: g-table-row -->
                    <tr class="g-table-row text-left">
                        <th class="pl-0">title</th>
                        <th>author</th>
                        <th>created at</th>
                        <th class="pr-0 text-right">gerir</th>
                    </tr>
                    <!-- Begin: g-table-row -->
                    </thead>
                    <!-- End: g-table-head -->
                    <!-- Begin: g-table-body -->
                    <tbody>

                        @if($galleries)

                            @foreach( $galleries as $gallery )
                            <!-- Begin: g-table-row -->
                            <tr class="g-table-row">
                                <td class="pl-0 title">
        {{--                            <img src="/storage/images/{{ $gallery->photos[0] }}" class="shadow-sm" alt="artigos">--}}
                                    <span>{{ $gallery->title }}</span>
                                </td>
                                <td>
                                    Mazivo
                                </td>
                                <td>
                                    {{ $gallery->created_at }}
                                </td>
                                <!-- Begin: manage -->
                                <td class="manage pr-0 text-right">
                                    <!-- Begin: g-row-item-manager -->
                                    <div class="g-row-item-manager">
                                        <i class="icon-dots_01 row-toggle"></i>
                                        <!-- Begin: Row Actions Menu -->
                                        <div class="g-row-actions-menu shadow">
                                            <a href="/manage/galleries/{{ $gallery->id }}/edit">Edit</a>
                                            <form action="/manage/galleries/{{ $gallery->id }}/delete" class="item-delete" method="POST">
                                                @csrf
                                                @method("DELETE")
                                                <button type="submit" class="btn btn-link">Delete</button>
                                            </form>
                                        </div>
                                        <!-- End: g-row-actions-menu -->
                                    </div>
                                    <!-- End: g-row-item-manager -->
                                </td>
                                <!-- End: manage -->
                            </tr>
                            <!-- End: g-table-row -->
                            @endforeach
                        @else

                            <h2>There no Galleries to display.</h2>

                        @endif

                    

                    </tbody>
                    <!-- End: g-table-body -->
                </table>
                <!-- End: table g-table -->
            </div>
            <!-- End: card-body -->
        </div>
        <!-- END: CONTENT -->
    </div>
    <!-- END: MAIN CONTENT  -->

    @include('partials.confirm')

@endsection
