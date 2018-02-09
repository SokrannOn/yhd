@extends('admin.master')
@section('content')
    <div class="container-fluid"><br>
        <div class="panel panel-default">
            <div class="panel-heading">
                Create Department
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-lg-4">
                        {!! Form::open(['action'=>'DepartmentController@store','method'=>'post']) !!}
                            <div class="form-groupt">
                                {!! Form::label('Department Name') !!}
                                {!! Form::text('name',null,['class'=>'edit-form-control']) !!}
                                @if($errors->has('name'))
                                    <span class="text-danger">{{$errors->first('name')}}</span>
                                @endif
                            </div>
                            <div class="form-groupt">
                                {!! Form::label('Description') !!}
                                {!! Form::text('Description',null,['class'=>'edit-form-control']) !!}
                                @if($errors->has('Description'))
                                    <span class="text-danger">{{$errors->first('Description')}}</span>
                                @endif
                            </div>
                        <div class="form-group">
                            {!! Form::submit('Create',['class'=>'btn btn-primary btn-sm']) !!}
                            {!! Form::reset('Reset',['class'=>'btn btn-warning btn-sm']) !!}
                        </div>
                        {!! Form::close() !!}
                    </div>
                    <div class="col-lg-8">
                        {{--Users Views--}}
                        <div class="container-fluid">
                            <div class="panel panel-default">
                                <div class="panel-heading">Department List</div>
                                <div class="panel-body">
                                    <!-- /.box-header -->
                                    <div id="viewDepartment">

                                    </div>
                                    <!-- /.box-body -->
                                </div>
                                <!-- Modal -->
                                <div id="myModal" class="modal fade" role="dialog">
                                    <div id="editDepartment">

                                    </div>
                                </div>

                            </div>
                        </div>
                        {{--End User Views--}}
                    </div>
                </div>
            </div>
            <div class="panel-footer"></div>
        </div>
    </div>
@endsection

@section('script')

    <script type="text/javascript">
    function listViewDepartment() {
        $.ajax({
            type : 'get',
            url: "{{url('/admin/department/view')}}",
            dataType: 'html',
            success:function (data) {
                $('#viewDepartment').html(data);
            },
            error:function (error) {
                console.log(error);
            }
        });
    }
        $(document).ready(function () {
            listViewDepartment();
        });

        function editDepartment(id) {
            $.ajax({
                type: 'get',
                url:"{{url('/admin/department/edit')}}"+"/"+id,
                dataType: 'html',
                success:function (data) {
                    $('#editDepartment').html(data);
                },
                error:function (error) {
                    console.log(error);
                }

            });

        }

        function deleteDepartment(id) {
            swal({
                title: "Are you sure?",
                text: "Are you sure that you want to delete this department ?",
                type: "warning",
                showCancelButton:true,
                confirmButtonText: "Yes",
                cancelButtonText : "No",
                cancelButtonColor:"#d33",
                confirmButtonColor: "red"
            }, function() {
                $.ajax({
                    url : "{{url('/admin/department/delete')}}"+"/"+id,
                    type: "get",
                    dataType: 'html'
                })
                    .done(function(data) {
                        swal("Deleted!", "Your file was successfully deleted!", "success");

                        $(document).ready(function () {
                            listViewDepartment();
                        });
                    })
                    .error(function(data) {
                        swal("Oops", "We couldn't connect to the server!", "error");
                    });
            });
        }
    </script>

@endsection