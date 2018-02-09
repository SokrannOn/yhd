
 @if(count($position))
     <table id="example1" class="table table-bordered table-striped">
         <thead>
         <tr>
             <th>No</th>
             <th>Position Name</th>
             <th>Department Name</th>
             <th>Created By</th>
             <th style="width:20%; !important;" class="center">Action</th>
         </tr>
         </thead>
         <tbody>
         <?php $i=1;?>
         @foreach($position as $p)
             <tr>
                 <td>{{$i++}}</td>
                 <td>{{$p->name}}</td>
                 <td>{{$p->department->name}}</td>
                 <td>{{\App\User::where('id',$p->user_id)->value('name')}}</td>
                 <td class="center">
                     <a href="#" onclick="updatePos('{{$p->id}}')" title="Edit Position" style="padding: 5px;" data-toggle="modal" data-target=".bs-example-modal-sm"><i class="fa fa-edit" style="color: #d59b0a"></i></a>
                     <a href="#" onclick="deletePos('{{$p->id}}')" title="Delete Position" style="padding: 5px;"><i class="fa fa-trash" style="color: red;"></i></a>

                 </td>
             </tr>
         @endforeach
         </tbody>
     </table>
 @else
     <h3>No record</h3>
 @endif