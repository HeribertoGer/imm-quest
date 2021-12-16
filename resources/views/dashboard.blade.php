@extends('layouts.app')
@section('title')
    Dashboard
@endsection

@section('content')
    <div class="container-fluid">
        <!-- ============================================================== -->
        <!-- Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
        <div class="row page-titles">
            <div class="col-md-5 col-12 align-self-center">
                <h3 class="card-title text-themecolor mb-0"><span class="lstick d-inline-block align-middle"></span>Dashboard
                </h3>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- Start Row -->
        <div class="row">
            <div class="col-lg-4 col-md-6  ">
                <a href="{{ route('checklists') }}">
                    <div class="card shadow-lg p-1">
                        <div class="card-body">
                            <div class="d-flex no-block">
                                <div class="mr-3 align-self-center"><span class="lstick d-inline-block align-middle"></span>
                                    <i class="fas fa-clipboard-check fa-3x"></i>
                                </div>
                                <div class="align-self-center">
                                    <h6 class="text-muted mt-2 mb-0">Active checklists</h6>
                                    <h2 class="text-center">{{ $vt_checklists }}</h2>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-lg-4 col-md-6 ">
                <a href="{{ route('checklists') }}">
                    <div class="card shadow-lg p-1">
                        <div class="card-body">
                            <div class="d-flex no-block">
                                <div class="mr-3 align-self-center"><span class="lstick d-inline-block align-middle">
                                    </span>
                                    <i style="font-size: 36px; rotate(180deg);" class="mdi mdi-timer-sand "></i>
                                </div>
                                <div class="align-self-center">
                                    <h6 class="text-muted mt-2 mb-0">Pending items</h6>
                                    <h2 class="text-center">{{ count($vt_cl_items) }}</h2>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-lg-4 col-md-6 ">
                <a href="{{ route('cases') }}">
                    <div class="card shadow-lg p-1">
                        <div class="card-body">
                            <div class="d-flex no-block">
                                <div class="mr-3 align-self-center"><span
                                        class="lstick d-inline-block align-middle"></span><i
                                        class="fas fa-ticket-alt fa-3x"></i></div>
                                <div class="align-self-center">
                                    <h6 class="text-muted mt-2 mb-0">Active cases</h6>
                                    <h2 class="text-center">{{ $vt_active_cases }}</h2>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        </div>
        <!-- End Row -->
        <!-- Start row -->
        <div class="row pt-3">
            <div class="col-lg-8">
                <div class="card shadow-lg">
                    <div class="card-header">
                        <h2 class="card-title"><span class="lstick d-inline-block align-middle"></span>My cases</h2>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Case title</th>
                                        <th>Case type</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($vtCases as $case)
                                        <tr id="1" class="gradeX">
                                            <td> <a href="{{ route('show_case', [$case->id]) }}">
                                                    {{ $case->ticket_title }}</a></td>
                                            <td>{{ $case->ticketcategories }} </td>
                                            <td>{{ $case->ticketstatus }} </td>
                                        </tr>
                                    @endforeach
                                </tbody>

                                <tfoot>
                                    <tr>
                                        <th>Case title</th>
                                        <th>Case type</th>
                                        <th>Status</th>
                                    </tr>
                                </tfoot>

                            </table>
                        </div>
                    </div>

                </div>
                <div class="card shadow-lg">
                    <div class="card-header">
                        <h2 class="card-title">
                            <span class="lstick d-inline-block align-middle"></span>Submit pending documents
                        </h2>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Checklist name</th>
                                        <th>Pending items</th>
                                        <th>Completed items</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($pending_checklists as $checklist)
                                        <tr id="1" class="gradeX">
                                            <td> <a href="{{ route('show_checklist', [$checklist->id]) }}">
                                                    {{ $checklist->name }}</a></td>
                                            <td>{{ $checklist->cf_1187 }} </td>
                                            <td>{{ $checklist->cf_1189 }} </td>
                                        </tr>
                                    @endforeach
                                </tbody>

                                <tfoot>
                                    <tr>
                                        <th>Checklist name</th>
                                        <th>Case type</th>
                                        <th>Status</th>
                                    </tr>
                                </tfoot>

                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <div class="col-lg-4 shadow-lg">
                <div class="row-12">
                    <div class="card shadow-lg">
                        <div class="card-header bg-white">
                            <h4 class="card-title"><span class="lstick d-inline-block align-middle"></span>Commboard
                            </h4>
                        </div>
                        <div class="card-body pl-1 pr-1 bg-secondary mt-3 rounded">
                            <div class="comment-widgets scrollable mb-2 common-widget ps-container ps-theme-default ps-active-y"
                                style="max-height: 1055px;" data-ps-id="0d80a00e-e8b5-f9c2-4133-ff5bf6a8f98f">
                                <!-- Comment Row -->
                                @foreach ($commboards as $key => $comm)
                                    @if ($comm && $comm->cf_2224 === "$contact->firstname $contact->lastname")
                                        <div class="d-flex flex-row border-top comment-row bg-white mt-3 rounded">
                                            <div class="comment-text w-100 px-2 pt-1">
                                                <h4 class="card-title px-3 card-header text-right">{{ $comm->cf_2224 }}
                                                </h4>
                                                <h5 class="mb-1 border-bottom px-3">{{ $comm->name }}</h5>
                                                <p class="mb-1 overflow-hidden px-3">{{ $comm->description }}</p>
                                                <div class="comment-footer"> <span
                                                        class="text-muted pull-right">{{ $comm->createdtime }}</span> <span
                                                        class="badge badge-info rounded-pill">{{ $comm->cf_2220 }}</span>
                                                </div>
                                            </div>
                                            <div class="p-1">
                                                <span data-toggle="tooltip" title="From me"
                                                    class="round text-white d-inline-block text-center rounded-circle bg-info">
                                                    <img src="/{{env('ASSET_URL')}}templates/theme-forest-admin-pro/main/admin-pro/src/assets/images/users/1.jpg"
                                                        class="rounded-circle" alt="user" width="50"></span>
                                            </div>
                                        </div>
                                        {{-- <div class="container">
                                            <a class="btn waves-effect waves-light btn-rounded btn-outline-success collapsed"
                                                data-toggle="collapse"
                                                data-target="#collapse{{ $comm->cf_2218 }}{{ $key }}"
                                                aria-expanded="false" >
                                                <i class="far fa-paper-plane"></i>
                                            </a>

                                            <div class="bg-light collapse"
                                                id="collapse{{ $comm->cf_2218 }}{{ $key }}">



                                                <form method="POST" action="{{ route('send_comment') }}">
                                                    @csrf
                                                    <div class="row border-bottom ">
                                                        <input type="hidden" name="threadid"
                                                            value="{{ $comm->cf_2218 }}">
                                                        <div class="col-12 card-header">
                                                            <h4 class="card-title px-3"><span
                                                                    class="lstick d-inline-block align-middle">
                                                                </span>Reply
                                                            </h4>
                                                        </div>
                                                        <div class="form-group col-10">
                                                            <input type="text" name="subject" id="" placeholder="Subject"
                                                                class="form-control pr-0" required data-toggle="tooltip"
                                                                title="Send">
                                                        </div>
                                                        <div class="form-group col-2 text-center pl-0">
                                                            <button type="submit" class="btn btn-info btn-circle btn-md ">
                                                                <i class="far fa-paper-plane"></i> </button>
                                                        </div>
                                                        <div class="form-group col-12">
                                                            <textarea placeholder="Body" class="form-control border-0"
                                                                name="comment" style="margin-top: 0px; margin-bottom: 0px;"
                                                                rows="2" required></textarea>
                                                        </div>
                                                    </div>
                                                </form>

                                            </div>

                                        </div> --}}

                                    @else
                                        <div class="d-flex flex-row border-top comment-row bg-white mt-3 rouded-top">
                                            <div class="p-1">
                                                <span
                                                    class="round text-white d-inline-block text-center rounded-circle bg-info">
                                                    <img src="/{{env('ASSET_URL')}}templates/theme-forest-admin-pro/main/admin-pro/src/assets/images/users/1.jpg"
                                                        class="rounded-circle" alt="user" width="50"></span>
                                            </div>
                                            <div class="comment-text w-100 px-2 pt-1">
                                                <h4 class="card-title card-header px-3">{{ $comm->cf_2224 }}</h4>
                                                <h5 class="mb-1 border-bottom">{{ $comm->name }}</h5>
                                                <p class="mb-1 overflow-hidden px'3">{{ $comm->description }}</p>
                                                <div class="comment-footer"> <span
                                                        class="text-muted pull-right">{{ $comm->createdtime }}</span> <span
                                                        class="badge badge-info rounded-pill">{{ $comm->cf_2220 }}</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="container bg-light rounded-bottom">
                                            <a class="btn waves-effect waves-light btn-rounded btn-outline-success collapsed bg-white"
                                                data-toggle="collapse"
                                                data-target="#collapse{{ $comm->cf_2218 }}{{ $key }}"
                                                aria-expanded="false" data-toggle="tooltip" title="Reply">
                                                <i class="far fa-paper-plane"></i>
                                            </a>

                                            <div class=" collapse"
                                                id="collapse{{ $comm->cf_2218 }}{{ $key }}">
                                                <form method="POST" action="{{ route('send_comment') }}">
                                                    @csrf
                                                    <div class="row border-bottom ">
                                                        <input type="hidden" name="threadid"
                                                            value="{{ $comm->cf_2218 }}">
                                                        <div class="form-group col-10">
                                                            <input type="text" name="subject" id="" placeholder="Subject"
                                                                class="form-control pr-0" required>
                                                        </div>
                                                        <div class="form-group col-2 text-center pl-0">
                                                            <button type="submit" class="btn btn-info btn-circle btn-md "
                                                                data-toggle="tooltip" title="Send">
                                                                <i class="far fa-paper-plane"></i> </button>
                                                        </div>
                                                        <div class="form-group col-12">
                                                            <textarea placeholder="Body" class="form-control border-0"
                                                                name="comment" style="margin-top: 0px; margin-bottom: 0px;"
                                                                rows="2" required></textarea>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    @endif
                                @endforeach

                                {{-- <div class="ps-scrollbar-x-rail" style="left: 0px; bottom: -126px;">
                                    <div class="ps-scrollbar-x" tabindex="0" style="left: 0px; width: 0px;"></div>
                                </div>
                                <div class="ps-scrollbar-y-rail" style="top: 126px; right: 3px; height: 450px;">
                                    <div class="ps-scrollbar-y" tabindex="0" style="top: 99px; height: 351px;"></div>
                                </div> --}}
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>


@endsection
