<div>
    <div class="d-flex text-muted">
     <div class="d-flex align-items-center">
            <span class=" material-icons  text-primary  text-muted"  type="button" data-toggle="modal" data-target="#exampleModalCenter"
                style="font-size:2rem; cursor: pointer;" >
                send
            </span>
            <span class="mx-2" >
                 share 
            </span>



<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Share</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        {{ url()->current() }}
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
        </div>


        <div class="d-flex align-items-center">
            <span class=" material-icons @if($likeActive) text-primary @else text-muted @endif"
                style="font-size:2rem; cursor: pointer;" wire:click.prevent="like">
                thumb_up
            </span>
            <span class="mx-2">
                {{ $likes }}
            </span>
        </div>


        <div class="d-flex align-items-center">
            <span class="material-icons @if($dislikeActive) text-primary @else text-muted @endif"
                style="font-size:2rem; cursor: pointer;" wire:click.prevent="dislike">
                thumb_down
            </span>
            <span class="mx-2">
                {{ $dislikes }}
            </span>
        </div>

    </div>
</div>