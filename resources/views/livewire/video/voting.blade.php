<div>
    <div class="d-flex text-muted">
     <div class="d-flex align-items-center">
           {{-- {{ $video->title }} --}}
          @if (Auth::user()->role == 'admin')

          <a href="#" class="btn btn-danger deletevideo" data-id="{{ $video->id }}">DELETE VIDEO</a>
              
          @endif
           <span class=" material-icons  text-primary  text-muted"  type="button" data-toggle="modal" data-target="#reportmodal"
                style="font-size:2rem; cursor: pointer;" >
                report
            </span>
            <span class="mx-2" >
                 Report
            </span>
            <span class=" material-icons  text-primary  text-muted"  type="button" data-toggle="modal" data-target="#exampleModalCenter"
                style="font-size:2rem; cursor: pointer;" >
                send
            </span>
            <span class="mx-2" >
                 share 
            </span>


<!-- Modal -->
<div class="modal fade" id="reportmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Form Report</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       <form action="/report" method="POST">
        @csrf
          <div class="form-group">

          <input hidden name="videos_id" value="{{ $video->id }}">
          <input hidden name="user_id" value="{{ Auth::user()->id }}">
          
            <label for="exampleFormControlTextarea1">Masukkan Detail Report</label>
            <textarea name="text" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
          </div>
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Submit Report</button>
      </div>
    </form>
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content" style="background-color: rgb(3, 3, 43); color: white;">
      <div class="modal-header">
        <h5 class="modal-title" style="color: white;" id="exampleModalLongTitle">Share</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        {{ url()->current() }}



         <div class="row justify-content-center text-center">
                    <div class="col-12 p-3 text-center">
                      
                      <a href="#" class="mr-2" target="_blank" id="facebook-btn"><i class="fab fa-facebook-square fa-3x" style="color: #3b5998; font-size: 3rem"></i></a>
                      <a href="#" class="mr-2" target="_blank" id="twitter-btn"><i class="fab fa-twitter-square fa-3x" style="color: #1da1f2; font-size: 3rem"></i></a>
                      <a href="#" class="mr-2" target="_blank" id="linkedin-btn"><i class="fab fa-linkedin fa-3x" style="color: #0077b5; font-size: 3rem"></i></a>
                      <a href="#" class="mr-2" target="_blank" id="whatsapp-btn"><i class="fab fa-whatsapp-square fa-3x" style="color: #25d366; font-size: 3rem"></i></a>
                      <a href="#" class="mr-2" target="_blank" id="gmail-btn"><i class="fas fa-envelope fa-3x" style="color: #cf3e39; font-size: 3rem"></i></a>
                     
                    </div>
                  </div>


      </div>
      <div class="modal-footer">
             
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        
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


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4"
        crossorigin="anonymous"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>
    $('.deletevideo').click(function () {
        var pegawaiid = $(this).attr('data-id');
        var nama = $(this).attr('data-nama');

        swal({
            title: "Yakin ?",
            text: "Kamu akan menghapus Video Ini ",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
            .then((willDelete) => {
                if (willDelete) {
                    window.location = "/videodelete/" + pegawaiid + ""
                    swal("Data berhasil di hapus", {
                        icon: "success",
                    });
                } else {
                    swal("Data tidak jadi dihapus");
                }
            });
    });
</script>

