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
            <th scope="col">Executive name</th>
                                    
            <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody>
    @php
    $counter=1;
    @endphp
    @foreach($users as $user)
    @foreach($leads as $lead)                        
    @if($user->id == $lead->user_id)                         
        <tr>
            <th>{{ $counter }}</th>
            @php
            $counter++;
            @endphp
            <td>{{$lead->name}}</td>
            <td>{{$lead->email}}</td>
            <td>{{$lead->phoneCode}}</td>
            <td>{{$lead->phone}}</td>
            <td>{{$lead->remark}}</td>
            <td>{{$lead->category}}</td>
            <td>{{$user->name}}</td>
            <td>
            <a class="btn btn-primary btn-sm" href="{{route('Assigned',$lead->id)}}" role="button">Assign</a>
            <a class="btn btn-danger btn-sm" href="{{route('deletedAdminLead',$lead->id)}}" role="button">Delete</a>
            
            </td>
        </tr>
        @endif
        @endforeach
        @endforeach

    </tbody>
</table>