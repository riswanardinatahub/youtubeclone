@extends('layouts.app')

@section('content')
{{-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8" id="locations">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                         <div class="form-group row">
                            <label for="channel_name" class="col-md-4 col-form-label text-md-right">{{ __('Channel Name') }}</label>

                            <div class="col-md-6">
                                <input id="channel_name" type="text" class="form-control @error('channel_name') is-invalid @enderror" name="channel_name" value="{{ old('channel_name') }}" required autocomplete="channel_name">

                                @error('channel_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="provinces_id" class="col-md-4 col-form-label text-md-right">Provinsi</label>
                            <div class="col-md-6">
                            <select name="provinces_id" id="provinces_id" class="form-control" v-if="provinces" v-model="provinces_id">
                            <option v-for="province in provinces" :value="province.id">@{{ province.name }}</option>
                            </select>
                            <select v-else class="form-control"></select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="regencies_id" class="col-md-4 col-form-label text-md-right">Kabupaten</label>
                            <div class="col-md-6">
                            <select name="regencies_id" id="regencies_id" class="form-control" v-if="regencies"
                            v-model="regencies_id">
                            <option v-for="regency in regencies" :value="regency.id">@{{ regency.name }}</option>
                            </select>
                            <select v-else class="form-control"></select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="districts_id" class="col-md-4 col-form-label text-md-right">Kecamatan/Kelurahan</label>
                            <div class="col-md-6">
                            <select name="districts_id" id="districts_id" class="form-control" v-if="districts"
                            v-model="districts_id">
                            <option v-for="district in districts" :value="district.id">@{{ district.name }}</option>
                            </select>
                            <select v-else class="form-control"></select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="villages_id" class="col-md-4 col-form-label text-md-right">Desa</label>
                            <div class="col-md-6">
                            <select name="villages_id" id="villages_id" class="form-control" v-if="villages"
                            v-model="villages_id">
                            <option v-for="village in villages" :value="village.id">@{{ village.name }}</option>
                            </select>
                            <select v-else class="form-control"></select>
                            </div>
                        </div>
                        
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> --}}

<div class="whole-wrap mt-2">
		<div class="container mt-5">
			<div class="section-top-border">
				<div class="container">
     <div class="row justify-content-center">
        <div class="col-md-8" id="locations">
            <div class="card">
                <div class=" text-center mt-5"><h3>Register </h3></div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                         <div class="form-group row">
                            <label for="channel_name" class="col-md-4 col-form-label text-md-right">{{ __('Channel Name') }}</label>

                            <div class="col-md-6">
                                <input id="channel_name" type="text" class="form-control @error('channel_name') is-invalid @enderror" name="channel_name" value="{{ old('channel_name') }}" required autocomplete="channel_name">

                                @error('channel_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="provinces_id" class="col-md-4 col-form-label text-md-right">Provinsi</label>
                            <div class="col-md-6">
                            <select name="provinces_id" id="provinces_id" class="form-control" v-if="provinces" v-model="provinces_id">
                            <option v-for="province in provinces" :value="province.id">@{{ province.name }}</option>
                            </select>
                            <select v-else class="form-control"></select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="regencies_id" class="col-md-4 col-form-label text-md-right">Kabupaten</label>
                            <div class="col-md-6">
                            <select name="regencies_id" id="regencies_id" class="form-control" v-if="regencies"
                            v-model="regencies_id">
                            <option v-for="regency in regencies" :value="regency.id">@{{ regency.name }}</option>
                            </select>
                            <select v-else class="form-control"></select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="districts_id" class="col-md-4 col-form-label text-md-right">Kecamatan/Kelurahan</label>
                            <div class="col-md-6">
                            <select name="districts_id" id="districts_id" class="form-control" v-if="districts"
                            v-model="districts_id">
                            <option v-for="district in districts" :value="district.id">@{{ district.name }}</option>
                            </select>
                            <select v-else class="form-control"></select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="villages_id" class="col-md-4 col-form-label text-md-right">Desa</label>
                            <div class="col-md-6">
                            <select name="villages_id" id="villages_id" class="form-control" v-if="villages"
                            v-model="villages_id">
                            <option v-for="village in villages" :value="village.id">@{{ village.name }}</option>
                            </select>
                            <select v-else class="form-control"></select>
                            </div>
                        </div>
                        
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="primary-btn text-uppercase">Register</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
			</div>
		</div>
	</div>

@endsection

@push('scripts')
  <script src="/vendor/vue/vue.js"></script>
  <script src="https://unpkg.com/vue-toasted"></script>
  <script src="https://unpkg.com/axios/dist/axios.min.js"></script>

 <script>
  var locations = new Vue({
    el: "#locations",
    mounted() {
      AOS.init();
      this.getProvincesData();
    },
    data: {
      provinces: null,
      regencies: null,
      districts: null,
      villages: null,
      provinces_id: null,
      regencies_id: null,
      districts_id: null,
      villages_id: null,
    },
    methods: {
      getProvincesData() {
        var self = this;
        axios.get('{{ route('api-provinces') }}')
          .then(function (response) {
            self.provinces = response.data;
          })
      },

      getRegenciesData() {
        var self = this;
        axios.get('{{ url('api/regencies') }}/' + self.provinces_id)
          .then(function (response) {
            self.regencies = response.data;
          })
      },

      getDistrictsData() {
        var self = this;
        axios.get('{{ url('api/districts') }}/' + self.regencies_id)
          .then(function (response) {
            self.districts = response.data;
          })
      },

      getVillagesData() {
        var self = this;
        axios.get('{{ url('api/villages') }}/' + self.districts_id)
          .then(function (response) {
            self.villages = response.data;
          })
      },

    },
    watch: {
      provinces_id: function (val, oldVal) {
        this.regencies_id = null;
        this.getRegenciesData();
      },

      regencies_id: function (val, oldVal) {
        this.districts_id = null;
        this.getDistrictsData();
      },

      districts_id: function (val, oldVal) {
        this.villages_id = null;
        this.getVillagesData();
      }
    }
  });

</script>
 
@endpush

