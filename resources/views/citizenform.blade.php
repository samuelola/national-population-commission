@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Add Citizen') }}</div>

                <div class="card-body">
                    <form method="POST" action="#">
                        @csrf

                         <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('gender')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Gender') }}</label>

                            <div class="col-md-6">
                                <input id="gender" type="text" class="form-control @error('gender') is-invalid @enderror" name="gender" value="{{ old('gender') }}" required autocomplete="gender" autofocus>

                                @error('gender')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Address') }}</label>

                            <div class="col-md-6">
                                <input id="address" type="text" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ old('address') }}" required autocomplete="address">

                                @error('address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="phone" class="col-md-4 col-form-label text-md-right">{{ __('Phone') }}</label>

                            <div class="col-md-6">
                                <input id="phone" type="phone" class="form-control @error('phone') is-invalid @enderror" name="phone" required autocomplete="phone">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                         <div class="form-group row">
                            <label for="state" class="col-md-4 col-form-label text-md-right">{{ __('State') }}</label>

                            <div class="col-md-6">
                                

                                <select name="state" id="state" class="form-control @error('state') is-invalid @enderror">
                                    <option selected disabled>Select State</option>
                                    @foreach ($states as $state)
                                    <option value="{{ $state->id }}">{{ $state->name }}</option>
                                    @endforeach
                                </select>

                                @error('state')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                         <div class="form-group row">
                            <label for="lga" class="col-md-4 col-form-label text-md-right">{{ __('LGAS') }}</label>

                            <div class="col-md-6">
                                

                                <select name="lga" id="lga" class="form-control @error('lga') is-invalid @enderror">
                                   
                                </select>

                                @error('lga')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                         <div class="form-group row">
                            <label for="lga" class="col-md-4 col-form-label text-md-right">{{ __('Wards') }}</label>

                            <div class="col-md-6">
                                

                                <select name="ward_id" id="ward" class="form-control @error('ward') is-invalid @enderror">
                                   
                                </select>

                                @error('ward')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Save') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')

<script>
    $(document).ready(function () {
            $('#state').on('change', function () {
                var stateId = this.value;
                $('#lga').html('');
                $.ajax({
                    url: '{{ route('getLgas') }}?state_id='+stateId,
                    type: 'get',
                    success: function (res) {
                        $('#lga').html('<option value="">Select LGA</option>');
                        $.each(res, function (key, value) {
                            $('#lga').append('<option value="' + value
                                .id + '">' + value.name + '</option>');
                        });
                        $('#ward').html('<option value="">Select Ward</option>');
                    }
                });
            });

           $('#lga').on('change', function () {
                var lgaId = this.value;
                $('#ward').html('');
                $.ajax({
                    url: '{{ route('getWards') }}?lga_id='+lgaId,
                    type: 'get',
                    success: function (res) {
                        $('#ward').html('<option value="">Select Ward</option>');
                        $.each(res, function (key, value) {
                            $('#ward').append('<option value="' + value
                                .id + '">' + value.name + '</option>');
                        });
                    }
                });
            });
            
        });
</script>

@endsection
