@extends('layouts.admin')
@section('style')
    @parent
@endsection
@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="content">
                            <div class="toolbar">
                                <a href="{{url('admin/spa_type/create')}}" rel="tooltip" title="Add New spa Type"
                                   class="btn btn-danger" style="margin-right: 20px">
                                    <i class="ti-plus"></i>
                                </a>
                                <!--Here you can write extra buttons/actions for the toolbar-->
                            </div>
                            <table id="bootstrap-table" class="table">
                                <thead>
                                <th data-field="sn" class="text-center">S.N.</th>
                                <th data-field="name" class="text-center">Name</th>
                                <th data-field="cost_per_day">Cost</th>
                                <th data-field="discount_percentage">Discount</th>
                                {{-- <th data-field="max_adult">Max Adult</th>
                                <th data-field="max_child">Max Child</th> --}}
                                <th data-field="status" data-sortable="true">Status</th>
                                <th data-field="actions" class="td-actions text-right">Actions
                                </th>
                                </thead>
                                <tbody>
                                @unless($spa_types->count())
                                    @else
                                        @foreach($spa_types as $index => $spa_type)
                                            <tr>
                                                <td>{{$index+1}}</td>
                                                <td>{{ $spa_type->name }}</td>
                                               <td><span class="badge">{{ config('app.currency').$spa_type->cost }}</span></td>
                                               <td><span class="badge">{{ $spa_type->discount_percentage."%" }}</span></td>
                                               {{-- <td><span class="btn btn-default btn-xs">{{ $spa_type->max_adult }}</span></td>
                                               <td><span class="btn btn-default btn-xs">{{ $spa_type->max_child }}</span></td> --}}
                                                <td>
                                                    @if($spa_type->status == 1)
                                                        <button class="btn btn-success btn-xs btn-fill">Active</button>
                                                    @else
                                                        <button class="btn btn-default btn-xs btn-fill">Inactive
                                                        </button>
                                                    @endif
                                                </td>
                                                <td>
                                                    {{-- <div class="table-icons">
                                                        <a rel="tooltip" title="Manage Images"
                                                           class="btn btn-simple btn-primary btn-icon table-action edit"
                                                           href="{{url('admin/spa_type/'.$spa_type->id.'/image')}}">
                                                            <i class="ti-image"></i>
                                                        </a>
                                                        <a rel="tooltip" title="Manage spas"
                                                           class="btn btn-simple btn-info btn-icon table-action edit"
                                                           href="{{url('admin/spa_type/'.$spa_type->id.'/spa')}}">
                                                            <i class="ti-package"></i>
                                                        </a> --}}
                                                        <a rel="tooltip" title="Edit"
                                                           class="btn btn-simple btn-warning btn-icon table-action edit"
                                                           href="{{url('admin/spa_type/'.$spa_type->id.'/edit')}}">
                                                            <i class="ti-pencil-alt"></i>
                                                        </a>
                                                        {{-- <button rel="tooltip" title="Remove"
                                                                class="btn btn-simple btn-danger btn-icon table-action"
                                                                onclick="delete_button($spa_type->id)">
                                                            <i class="ti-close"></i>
                                                        </button> --}}
                                                        <form style='display:inline' action="{{ route('spa_type.destroy', $spa_type->id)}}" method="post">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button rel="tooltip" title="Remove" class="btn btn-simple btn-danger btn-icon table-action" type="submit" onclick="return confirm('??tes-vous s??re de cette d??cision?')" >  <i class="ti-close"></i></button>
                                                          </form>
                                                        {{-- <div class="collapse">
                                                            {!! Form::open(array('id' => 'delete-spa_type', 'url' => 'admin/spa_type/'.$spa_type->id)) !!}
                                                            {{ Form::hidden('_method', 'DELETE') }}
                                                            <button type="submit" class="btn btn-danger btn-ok">Delete</button>
                                                            {!! Form::close() !!}
                                                        </div> --}}

                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                        @endunless
                                </tbody>
                            </table>
                        </div>
                    </div><!--  end card  -->
                </div> <!-- end col-md-12 -->
            </div> <!-- end row -->
        </div>
    </div>
@endsection
@section('scripts')
    @parent

    <!-- Sweet Alert 2 plugin -->
    <script src="{{ asset('backend/js/sweetalert2.js') }}"></script>

    <!--  Bootstrap Table Plugin    -->
    <script src="{{ asset('backend/js/bootstrap-table.js') }}"></script>
    <script type="text/javascript">

        var delete_button = function(){
            swal({  title: "Are you sure?",
                text: "You want to delete the spa_type. Deleting spa_type will also delete its spas and its spa bookings.",
                type: "warning",
                showCancelButton: true,
                confirmButtonClass: "btn btn-info btn-fill",
                confirmButtonText: "Yes, delete it!",
                cancelButtonClass: "btn btn-danger btn-fill",
                closeOnConfirm: false,
            },function(){
                $('form#delete-spa_type').submit();
            });
        }


        var $table = $('#bootstrap-table');
        $().ready(function () {
            $table.bootstrapTable({
                toolbar: ".toolbar",
                clickToSelect: true,
                showRefresh: true,
                search: true,
                showToggle: true,
                showColumns: true,
                pagination: true,
                searchAlign: 'left',
                pageSize: 8,
                clickToSelect: false,
                pageList: [8, 10, 25, 50, 100],

                formatShowingRows: function (pageFrom, pageTo, totalRows) {
                    //do nothing here, we don't want to show the text "showing x of y from..."
                },
                formatRecordsPerPage: function (pageNumber) {
                    return pageNumber + " rows visible";
                },
                icons: {
                    refresh: 'fa fa-refresh',
                    toggle: 'fa fa-th-list',
                    columns: 'fa fa-columns',
                    detailOpen: 'fa fa-plus-circle',
                    detailClose: 'ti-close'
                }
            });

            //activate the tooltips after the data table is initialized
            $('[rel="tooltip"]').tooltip();

            $(window).resize(function () {
                $table.bootstrapTable('resetView');
            });
        });

    </script>
@endsection

