<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Lead Form') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form action="{{route('save')}}" method="post">
                        @csrf
                        <div class="mb-3">
                            <label for="nameControl" class="form-label">Name</label>
                            <input type="text" class="form-control" id="nameControl" name="name" required />
                        </div>
                        <div class="mb-3">
                            <label for="contact">Mobile or Email:</label>
                            <input type="email" id="email" class="form-control" name="email" placeholder="Enter your email address" required><br><br>
                             <span>OR</span><br>
                             <input type="tel" id="contact" class="form-control" name="contact" placeholder="Enter your mobile number" pattern="[0-9]{10}" required><br><br>
                            
                        </div>
                        
                        <div class="mb-3">
                            <label for="phoneCode" class="form-label">Phone code</label>
                            <input type="text" class="form-control" id="phoneCode" name="code" required />
                        </div>
                        <div class="mb-3">
                            <label for="remarkControl" class="form-label">Remarks</label>
                            <textarea class="form-control" id="remarkControl" name="remark" rows="3"></textarea>
                        </div>
                        
                        <div class="mb-3">
                            <label for="categorycontrol" class="form-label">Category</label>
                            <select  class="form-select" name="category" aria-label="Default select example">
                            
                                <option selected>Choose the category</option>
                                @foreach($categories as $category)
                                <option value="{{$category->id}}">{{$category->category}}</option>
                                @endforeach 
                            </select>
                        </div>

                      
                        <div class="mb-3">
                            <button class="btn btn-primary" type="submit">Create Lead</button>
                        </div>
                    </form>
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
</head>
<body>
    
</body>
</html>
