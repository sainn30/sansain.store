<x-app-layout>

    <div class="container mt-5">
        <div class="row">

            <div class="col-md-12">
                <a href="{{ url('dashboard') }}" class="btn btn-primary"><i class="fa fa-arrow-left"></i> Kembali</a>
            </div>
            <div class="col-md-12 mt-2">
                <nav aria-label="breadcrumb" class="bg-light rounded-3 p-3 mb-4
">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Profile</li>
                  </ol>
                </nav>
            </div>
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <h4><i class="fa fa-user"></i> My Profile</h4>
                        <table class="table">
                            <tbody>
                                <tr>
                                    <td>Nama</td>
                                    <td>:</td>
                                    <td>{{ $user->name}}</td>
                                </tr>
                                <tr>
                                    <td>Email</td>
                                    <td>:</td>
                                    <td>{{ $user->email}}</td>
                                </tr>
                                <tr>
                                    <td>No Hp</td>
                                    <td>:</td>
                                    <td>{{ $user->nohp}}</td>
                                </tr>
                                <tr>
                                    <td>Alamat</td>
                                    <td>:</td>
                                    <td>{{ $user->alamat}}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card mt-3 mb-4">
                    <div class="card-body">
                        <h4><i class="fa fa-pencil-alt"></i> Edit Profile</h4>
                        <form method="POST" action="{{ url('profile2/update') }}">
                            @csrf
                            @method('Patch')
    
                            <div class="form-group row mt-3">
                                <label for="name" class="col-md-2 col-form-label text-md-right">{{ __('Name') }}</label>
    
                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $user->name }}" required autocomplete="name" autofocus>
    
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
    
                            <div class="form-group row mt-3">
                                <label for="email" class="col-md-2 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>
    
                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $user->email }}" required autocomplete="email">
    
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
    
                            <div class="form-group row mt-3">
                                <label for="nohp" class="col-md-2 col-form-label text-md-right">No. HP</label>
    
                                <div class="col-md-6">
                                    <input id="nohp" type="text" class="form-control @error('nohp') is-invalid @enderror" name="nohp" value="{{ $user->nohp }}"  autofocus>
    
                                    @error('nohp')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
    
                            <div class="form-group row mt-3">
                                <label for="alamat" class="col-md-2 col-form-label text-md-right">Alamat</label>
    
                                <div class="col-md-6">
                                    <textarea name="alamat" class="form-control @error('alamat') is-invalid @enderror" >{{ $user->alamat }}</textarea>
    
                                    @error('alamat')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
    
                            <div class="form-group row mt-3">
                                <label for="password" class="col-md-2 col-form-label text-md-right">{{ __('Password') }}</label>
    
                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password">
    
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
    
                            <div class="form-group row mt-3">
                                <label for="password-confirm" class="col-md-2 col-form-label text-md-right">{{ __('Confirm Password') }}</label>
    
                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation">
                                </div>
                            </div>
    
                            <div class="form-group row mb-0 mt-3">
                                <div class="col-md-6 offset-md-2">
                                    <button type="submit" class="btn btn-primary">
                                        Save
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
