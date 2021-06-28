@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="row justify-content-center mt-5">
                <div class="col-12">
                    <h2 class="py-5">DATA REPORT</h2>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="container mb-5">
    <div class="row">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Judul Video</th>
                    <th scope="col">Thumbnail Video</th>
                    <th scope="col">Pelapor</th>
                    <th scope="col">Detail Laporan</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $index => $row)
                <tr>
                    <th scope="row">{{ $index + $data->firstItem() }}</th>
                    @php
                        $video = App\Models\Video::find($row->videos_id)
                    @endphp
                    <td>{{ $video->title }}</td>
                    <td> <img style="max-height: 40px;" src="{{ $video->thumbnail }}" alt=""></td>
                    @php
                        $user = App\Models\User::find($row->user_id)
                    @endphp
                    <td>{{ $user->name }}</td>
                    <td>{{ $row->text }}</td>
                    
                    <td>

                      
                        <a href="#" class="btn btn-warning deletereport" data-id="{{ $row->id }}">Tolak</a>
                        <a href="{{ route('video.watch', $video)}}" target="_blank" class="btn btn-info">Cek Video</a>
                    </td>
                </tr>
                @endforeach

            </tbody>


        </table>

        {{ $data->links() }}
    </div>
</div>

<br>
<br>
<br>
<br>
@endsection

@push('scripts')
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4"
        crossorigin="anonymous"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>
    $('.deletereport').click(function () {
        var pegawaiid = $(this).attr('data-id');
        var nama = $(this).attr('data-nama');

        swal({
            title: "Yakin ?",
            text: "Kamu akan menghapus Laporan ini ",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
            .then((willDelete) => {
                if (willDelete) {
                    window.location = "/tolakreport/" + pegawaiid + ""
                    swal("Data berhasil di hapus", {
                        icon: "success",
                    });
                } else {
                    swal("Data tidak jadi dihapus");
                }
            });
    });
</script>

<script>
    $('.deletevideo').click(function () {
        var pegawaiid = $(this).attr('data-id');
        var nama = $(this).attr('data-nama');

        swal({
            title: "Yakin ?",
            text: "Kamu akan menghapus Video ini ",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
            .then((willDelete) => {
                if (willDelete) {
                    window.location = "/tolakreport/" + pegawaiid + ""
                    swal("Data berhasil di hapus", {
                        icon: "success",
                    });
                } else {
                    swal("Data tidak jadi dihapus");
                }
            });
    });
</script>
@endpush