<div class="modal-dialog modal-sm" role="document">
    <div class="panel panel-default">
        <div class="panel-heading">
            Update
        </div>
        {!! Form::model($p,['action'=>['PositionController@update',$p->id],'method'=>'PATCH']) !!}
        <div class="panel-body">
            {!! Form::label('Position Name') !!}
            {!! Form::text('name',null,['class'=>'edit-form-control','required'=>true]) !!}

            {!! Form::label('Description')!!}
            {!! Form::text('description',null,['class'=>'edit-form-control'])!!}

            {!! Form::label('department_id','&nbsp;Department Name',['class'=>'edit-label']) !!}
            {!! Form::select('department_id',$department,null,['class'=>'edit-form-control','placeholder'=>'Please select one', 'required'=>true ]) !!}

        </div>
        <div class="panel-footer">
            {!! Form::submit('Update',['class'=>'btn btn-success btn-sm']) !!}
            <input type="button" value="Close" data-dismiss="modal" class="btn btn-danger btn-sm">
        </div>
        {!! Form::close() !!}
    </div>
</div>
</div>