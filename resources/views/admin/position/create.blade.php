@extends('admin.master')

@section('content')
    <br>
    <div class="container-fluid">
        <div class="panel panel-default">
            <div class="panel-heading">
                Create Position
            </div>
            <div class="panel-body">
                <div class="row">
                    {!! Form::open(['action'=>'PositionController@store','method'=>'post']) !!}
                    <input type="hidden" value="{{csrf_token()}}">
                        <div class="col-md-4">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            {!! Form::label('Position Name')!!}
                                            {!! Form::text('name',null,['class'=>'edit-form-control'])!!}
                                            @if($errors->has('name'))
                                                <span class="text-danger">
                                                    {{$errors->first('name')}}
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            {!! Form::label('Description')!!}
                                            {!! Form::text('description',null,['class'=>'edit-form-control'])!!}
                                            @if($errors->has('description'))
                                                <span class="text-danger">
                                                    {{$errors->first('description')}}
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        {!! Form::label('department_id','&nbsp;Department Name',['class'=>'edit-label']) !!}
                                        {!! Form::select('department_id',$department,null,['class'=>'edit-form-control','placeholder'=>'Please select one', 'required'=>true ]) !!}
                                        @if($errors->has('department_id'))
                                            <span class="text-danger">{{$errors->first('department_id')}}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                {!! Form::submit('Create',['class'=>'btn btn-primary btn-sm']) !!}
                                {!! Form::reset('Reset',['class'=>'btn btn-warning btn-sm']) !!}
                            </div>

                        </div>
                    {!! Form::close() !!}
                        <div class="col-md-8">

                            <div class="container-fluid">
                                <div class="panel panel-default">
                                    <div class="panel-heading">Position List</div>
                                    <div class="panel-body">
                                        <!-- /.box-header -->
                                        <div id="viewPosition">

                                        </div>
                                        <!-- /.box-body -->
                                    </div>
                                    <!-- Modal -->
                                    <div id="myModal" class="modal fade" role="dialog">
                                        <div id="editPosition">

                                        </div>
                                    </div>

                                </div>
                            </div>

                        </div>
                </div>

                <div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
                    <div id="updatePosition">

                    </div>
                </div>

            </div>
            <div class="panel-footer">

            </div>
        </div>
    </div>
@endsection

@section('script')
    <script type="text/javascript">

        function listViewPosition() {
            $.ajax({
                type : 'get',
                url: "{{url('/admin/position/view')}}",
                dataType: 'html',
                success:function (data) {
                    $('#viewPosition').html(data);
                },
                error:function (error) {
                    console.log(error);
                }
            });
        }
        $(document).ready(function () {
            listViewPosition();
        });

        function updatePos(id) {
            $.ajax({
                type:'get',
                url:"{{url('/admin/position/edit')}}"+"/"+id,
                dataType:'html',
                success:function (data) {
                   $('#updatePosition').html(data);
                },
                error:function (error) {
                    console.log(error);
                }
            });
        }

        function deletePos(id) {
            swal({
                title: "Are you sure?",
                text: "Are you sure that you want to delete this position ?",
                type: "warning",
                showCancelButton:true,
                confirmButtonText: "Yes",
                cancelButtonText : "No",
                cancelButtonColor:"#d33",
                confirmButtonColor: "red"
            }, function() {
                $.ajax({
                    url : "{{url('/admin/position/delete')}}"+"/"+id,
                    type: "get",
                    dataType: 'html'
                })
                    .done(function(data) {
                        swal("Deleted!", "Your file was successfully deleted!", "success");

                        $(document).ready(function () {
                            listViewPosition();
                        });
                    })
                    .error(function(data) {
                        swal("Oops", "We couldn't connect to the server!", "error");
                    });
            });
        }

    </script>
@endsection