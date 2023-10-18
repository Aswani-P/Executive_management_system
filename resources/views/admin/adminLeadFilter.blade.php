<table class="table">
    <thead>
        <tr>
            <th scope="col">SI.NO</th>
            <th scope="col">Lead Name</th>
            <th scope="col">Email</th>
            <th scope="col">Phone code</th>
            <th scope="col">Phone</th>
            <th scope="col">Remark</th>
            <th scope="col">Category</th>
                                    
            <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody>
                                
    @foreach($leads as $lead)
                              
        <tr>
            <th scope="row">{{$loop->iteration}}</th>
            <td>{{$lead->name}}</td>
            <td>{{$lead->email}}</td>
            <td>{{$lead->phoneCode}}</td>
            <td>{{$lead->phone}}</td>
            <td>{{$lead->remark}}</td>
            <td>{{$lead->category}}</td>
            <td>
                <a class="btn btn-info" href="{{route('editLeads',$lead->id)}}" role="button">edit</a>
                <a class="btn btn-danger" href="{{route('deletedAdminLead',$lead->id)}}" role="button">Delete</a>
            
            </td>
        </tr>
        @endforeach

    </tbody>
</table>