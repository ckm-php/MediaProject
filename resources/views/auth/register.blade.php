@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>
                @if ($message = Session::get('success'))
                <div class="alert alert-success alert-block">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                        <strong>{{ $message }}</strong>
                </div>
                @endif
                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}" accept-charset="UTF-8" enctype="multipart/form-data" >
                        @csrf
                        
                        <div class="row mb-3" style="margin-left: 20%">
                            <input id="image" name="image" placeholder="Choose image"  type="file" accept="image/*"  onchange="showMyImage(this)" required />
                            <br/>
                           <img id="thumbnil" style="width:20%; margin-top:10px;visibility:hidden;"  src="" alt="image"  />
                        </div>

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>
                        <div class="form-check">    
                            <label class="form-check-label" style="margin-top: 10px;margin-left:20%;">
                                <input style="opacity: 1;" class="form-check-input eremove" id="terms" type="checkbox" value="1" name="term" required>
                                <span class="form-check-sign">
                                    <span class="check"></span>
                                </span>
                                <a href="#" style="font-weight:bold;" id="agreement">MemberShip</a>  Aggrement
                            </label><br />
                        </div>
                        @error('term')
                        <div>
                            <span class="text-danger error-text term_error" style="font-size: 13px;margin-left: 20px;" id="erspan6">Please Checkbox Click!</span>
                        </div>
                        @enderror
                        

                        <div class="form-group{{ $errors->has('g-recaptcha-response') ? ' has-error' : '' }}">
                            <div class="col-md-12 mb-4" style="margin-left:20%">
                                {{-- {!! app('captcha')->display() !!}  --}}
                               {{-- {!! NoCaptcha::renderJs() !!}
                                {!! htmlFormSnippet() !!}  --}}
                                @if ($errors->has('g-recaptcha-response'))
                                <span class="help-block text-danger">
                                    <strong>{{ $errors->first('g-recaptcha-response') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        {{-- <div class="form-group mb-4" style="margin-left:20%">
                            {!! NoCaptcha::renderJs() !!}
                            {!! htmlFormSnippet() !!} 
                        </div> --}}
                        <div class="row mb-0">
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
</div>
<script>
      $('#agreement').click(function() {
             alert("df");
            //$('#addModal').modal('show');
        });

        function showMyImage(fileInput) {
        var files = fileInput.files;
        for (var i = 0; i < files.length; i++) {           
            var file = files[i];
            var imageType = /image.*/;     
            if (!file.type.match(imageType)) {
                continue;
            }           
            var img=document.getElementById("thumbnil");  
            img.style.visibility="visible";  
            img.file = file;    
            var reader = new FileReader();
            reader.onload = (function(aImg) { 
                return function(e) { 
                    aImg.src = e.target.result; 
                }; 
            })(img);
            reader.readAsDataURL(file);
        }    
    }
</script>
@endsection
