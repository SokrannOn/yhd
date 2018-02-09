
 @if(count($dept))
     <table id="supplier" class="table table-bordered table-striped table-hover">
        <thead>
            <tr>
                <th>No</th>
                <th>Name</th>
                <th>Description</th>
                <th>Created By</th>
                <th>Action</th>
            </tr>
            <?php $i=1; ?>
            @foreach($dept as $d)
                <tr>
                    <td class="center">{{$i++}}</td>
                    <td>{!! $d->name !!}</td>
                    <td>{!! $d->description !!}</td>
                    <td>{!! $d->user->name!!}</td>
                    <td>
                        <a href="#" onclick='editDepartment("{{$d->id}}")' title="Edit Department" style="padding: 5px;" data-toggle="modal" data-target="#myModal"><i class="fa fa-edit" style="color: #d59b0a"></i></a>
                        <a href="#" style="padding: 5px;" onclick='deleteDepartment("{{$d->id}}")' title="Delete Department"><i class="fa fa-trash" style="color: red;"></i></a>

                    </td>
                </tr>
            @endforeach
        </thead>
    </table>
 @else
     <h3>No record</h3>
 @endif