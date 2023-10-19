<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Executive lead Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                <x-auth-session-status class="mb-4" :status="session('message')" />
                    <div class="container">
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
                                
                                @foreach($exs as $ex)
                              
                                <tr>
                                    <th scope="row">{{$loop->iteration}}</th>
                                    <td>{{$ex->name}}</td>
                                    <td>{{$ex->email}}</td>
                                    <td>{{$ex->phoneCode}}</td>
                                    <td>{{$ex->phone}}</td>
                                    <td>{{$ex->remark}}</td>
                                    <td>{{$ex->category->category}}</td>
                                    <td>
                                    <a class="btn btn-warning" href="{{route('exeEdit',$ex->id)}}" role="button">Edit</a>
                                    <button type="button" class="btn btn-danger bg-red-700" onclick="confirmAndDelete({{ $ex->id }})">Delete</button>


    
                                    </td>
                                </tr>
                            

                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</head>
<body>
    <script>
        
        function confirmAndDelete(leadId) {
        if (confirm('Are you sure ?  Do you want to delete ?')) {
            window.location.href = "{{ route('LeadDeleteEx', ':leadId') }}".replace(':leadId', leadId);
        }
    }
</script>
    
</body>
</html>
