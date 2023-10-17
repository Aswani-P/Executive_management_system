<!-- Button trigger modal -->


<!-- Modal -->
@foreach($exs as $ex)
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">Delete</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            Are you sure? You want to Delete!
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <form action="{{ route('LeadDeleteEx', $ex->id) }}" method="POST">
                @csrf
               
                <button type="submit" class="btn btn-danger">Delete</button>
            </form>
           
            
           
        </div>
        </div>
    </div>
    </div>
    @endforeach
