<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>{{ config('app.name', 'Laravel') }}</title>
        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
        <!-- Fonts -->
        <link rel="dns-prefetch" href="//fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('css/register/style.css')}}">
        <style type="text/css">
            .register-sidebar{
            background: url('{{ asset('css/images/sidebar-blue@2x.png') }}');
            }
        </style>
    </head>
    <body>
    
        <div id="app">
        <!-- MultiStep Form -->
        <div class="container-fluid" id="grad1">
            <div class="row justify-content-center mt-0">
                <div class="col-sm-2 col-md-2 col-lg-2 col-xs-12 register-sidebar">
                    <div class="testimonial-div">
                        <h4 class="mb-3">
                            <i class="fa fa-quote-left" style="font-size:24px"></i>
                            <p class="testimonial-text">Keyinsights skaber et fantastisk overblik over min traﬁk. Det gør,  at jeg i dag er meget mere sikker på hvor jeg skal fokuserer min markedsføring.
                            </p>
                        </h4>
                        <dl>
                            <dt>Jesper Overgaard,</dt>
                            <dd>Virskomhedsnavn.</dd>
                        </dl>
                        <div class="d-block d-md-flex align-items-center">
                            <span class="thumb-img"><img src="{{ asset('css/images/client-avatar@2x.png') }}" alt="wrapkit" class="rounded-circle"/></span>
                        </div>
                    </div>
                </div>
                <div class="col-sm-10 col-md-10 col-lg-10 col-xs-12 mt-3 mb-2">
                    {{-- 
                    <div class="col-11 col-sm-9 col-md-7 col-lg-6 text-center p-0 mt-3 mb-2">
                        --}} {{-- old code --}}
                        <p class="text-right">Har du allerede konto? <a href="{{ route('login') }}">Log ind</a></p>
                        
                    {{--     @include('partials.messages')
                     --}}
                        <div class="card px-0 pt-4 pb-0 mt-3 mb-3">
                            <div class="row justify-content-center ">
                                <div class="col-md-6 mx-0">
                                    <form  id="msform" method="POST" action="{{ route('register') }}">
                                        @csrf
                                        <!-- progressbar -->
                                        <ul id="progressbar">
                                            <li class="active" ><a class="steps" ></a></li>
                                            <li><a class="steps" ></a></li>
                                            <li><a class="steps" ></a></li>
                                        </ul>
                                        <!-- fieldsets -->
                                        <fieldset>
                                            <div class="form-card">
                                                <h2 class="fs-title text-center">Start din gratis prøveperiode</h2>
                                                <p class="text-center">Du vil i de første 14 dage få adgang til PRO pakken</p>
                                                <div class="form-group row">
                                                    <div class="col-md-6">
                                                        <label for="first_name" class="col-form-label"><b>{{ __('Fornavn') }}</b></label>
                                                        <input type="text"  value="{{ old('first_name') }}" class="form-control @error('first_name') is-invalid @enderror" required name="first_name"/>
                                                        @error('first_name') <span class="text-danger">{{ $message }}</span> @enderror
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label for="last_name" class="col-form-label"><b>{{ __('Efternavn') }}</b></label>
                                                        <input type="text"  value="{{ old('last_name') }}" class="form-control @error('last_name') is-invalid @enderror" required name="last_name"/>
                                                        @error('last_name') <span class="text-danger">{{ $message }}</span> @enderror
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="col-md-12">
                                                        <label for="email" class="col-form-label"><b>{{ __('E-mail') }}</b></label>
                                                        <input type="email"  value="{{ old('email') }}" required class="form-control @error('email') is-invalid @enderror" name="email"/>
                                                        @error('email') <span class="text-danger">{{ $message }}</span> @enderror
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="col-md-12">
                                                        <label for="email" class="col-form-label"><b>{{ __('Password') }}</b></label>
                                                        <input type="password"  value="{{ old('password') }}" required class="form-control @error('password') is-invalid @enderror" name="password"/>
                                                        @error('password') <span class="text-danger">{{ $message }}</span> @enderror
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="col-md-12">
                                                        <label for="password_confirmation" class="col-form-label"><b>{{ __('Confrim Password') }}</b></label>
                                                        <input type="password"  value="{{ old('password_confirmation') }}" required class="form-control @error('password_confirmation') is-invalid @enderror" name="password_confirmation"/>
                                                        @error('password_confirmation') <span class="text-danger">{{ $message }}</span> @enderror
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="col-md-12">
                                                        <label for="phone" class="col-form-label"><b>{{ __('Telefon') }}</b></label>
                                                        <input type="text"  value="{{ old('phone') }}" class="form-control @error('phone') is-invalid @enderror" name="phone"/>
                                                        @error('phone') <span class="text-danger">{{ $message }}</span> @enderror
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="col-md-12">
                                                        <input type="button" name="next" class="next action-button form-control" value="Start prøveperiode nu" />
                                                        <p class="text-left">Efter sign-up vil du modtage et link, hvor du skal tilsende os data til onboarding, og så vil du blive kontaktet af en Account Manager for at sikre en succesfuld onboarding.</p>
                                                        <p class="text-left">Vi forsøger at onboarde alle kunder indenfor 24 timer på hverdage. Din 14 dages gratis periode starter først, fra klarmelding af din onboarding fra vores side.</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </fieldset>
                                        <fieldset>
                                            <div class="form-card">
                                                <h2 class="fs-title  text-center">Fortæl os om din virksomhed</h2>
                                                <p class="text-center">Fortæl os en smule om din virksomhed. Informationen vil blive brugt til at sætte din organisation op i Keyinsights.</p>
                                                <div class="form-group row">
                                                    <div class="col-md-12">
                                                        <label for="company_name" class="col-form-label"><b>{{ __('Dit ﬁrmanavn') }}</b></label>
                                                        <input type="text" required value="{{ old('company_name') }}" name="company_name" class="form-control @error('company_name') is-invalid @enderror" name="company_name"/>
                                                        @error('company_name') <span class="text-danger">{{ $message }}</span> @enderror
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="col-md-12">
                                                        <label for="domain_name" class="col-form-label"><b>{{ __('Dit domæne') }}</b></label>
                                                        <input type="text"  value="{{ old('domain_name') }}"class="form-control @error('domain_name') is-invalid @enderror" required name="domain_name"/>
                                                        @error('domain_name') <span class="text-danger">{{ $message }}</span> @enderror
                                                        <p>Du har altid mulighed for at tilføje flere domæner efterfølgende.</p>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="col-md-12">
                                                        <input type="button" name="next" class="next action-button form-control" value="Næste" />
                                                        <p class="text-left">Efter sign-up vil du modtage et link, hvor du skal tilsende os data til onboarding, og så vil du blive kontaktet af en Account Manager for at sikre en succesfuld onboarding.</p>
                                                        <p class="text-left">Vi forsøger at onboarde alle kunder indenfor 24 timer på hverdage. Din 14 dages gratis periode starter først, fra klarmelding af din onboarding fra vores side.</p>
                                                        <button type="button" class="btn btn-link previous action-button-previous"><span><i class="fa fa-arrow-left"> Go back</i></span>
                                                        </button>    
                                                    </div>
                                                </div>
                                            </div>
                                        </fieldset>
                                        <fieldset>
                                            <div class="form-card">
                                                <h2 class="fs-title  text-center">Fortæl os om dig selv</h2>
                                                <p class="text-center">Hjælp os med at skræddersy Keyinsights til dine behov, ved at fortælle lidt om, hvad du laver til daglig.</p>
                                                <div class="form-group row">
                                                    <div class="col-md-12">
                                                        <label for="department_id" class="col-form-label"><b>{{ __('Hvilken afdeling  du i?') }}</b></label>
                                                        <select required class="form-control @error('department_id') is-invalid @enderror" name="department_id" class="form-contarbejderrol">
                                                            <option value=""></option>
                                                            <option value="1" {{ (old('department_id')=="1")?"selected":"" }} >Option 1</option>
                                                            <option value="2" {{ (old('reason_to_join')=="2")?"selected":"" }} >Option 2</option>
                                                        </select>
                                                        @error('department_id') <span class="text-danger">{{ $message }}</span> @enderror
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="col-md-12">
                                                        <label for="role_id" class="col-form-label"><b>{{ __('Hvad er din rolle?') }}</b></label>
                                                        <select name="role_id" class="form-control @error('role_id') is-invalid @enderror">
                                                            <option value=""></option>
                                                            @foreach($roles as $role)
                                                            <option value="{{ $role->id }}" {{ (old('role_id')==$role->id)?"selected":"" }} >{{ $role->name }}</option>
                                                            @endforeach
                                                        </select>
                                                        @error('role_id') <span class="text-danger">{{ $message }}</span> @enderror
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="col-md-12">
                                                        <label for="reason_to_join" class="col-form-label"><b>{{ __('Hvorfor har du valgt at bruge Keyinsights?') }}</b></label>
                                                        <select name="reason_to_join" class="form-control @error('reason_to_join') is-invalid @enderror">
                                                            <option value=""></option>
                                                            <option value="1" {{ (old('reason_to_join')=="1")?"selected":"" }} >Option 1</option>
                                                            <option value="2" {{ (old('reason_to_join')=="2")?"selected":"" }} >Option 2</option>
                                                        </select>
                                                        @error('reason_to_join') <span class="text-danger">{{ $message }}</span> @enderror
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="col-md-12">
                                                        <input type="button" name="next" class="next action-button form-control @error('email') is-invalid @enderror submit" value="Begynd at bruge Keyinsights" />
                                                        <p class="text-left">Efter sign-up vil du modtage et link, hvor du skal tilsende os data til onboarding, og så vil du blive kontaktet af en Account Manager for at sikre en succesfuld onboarding.</p>
                                                        <p class="text-left">Vi forsøger at onboarde alle kunder indenfor 24 timer på hverdage. Din 14 dages gratis periode starter først, fra klarmelding af din onboarding fra vores side.</p>
                                                        <button type="button" class="btn btn-link previous action-button-previous"><span><i class="fa fa-arrow-left"> Go back</i></span>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </fieldset>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
      
        <script src="{{ asset('js/register/javascript.js') }}"></script>
        <script type="text/javascript">
            @if(isset($errors) && count($errors) > 0)
                {{-- @foreach ($errors as $error) --}}

                    {{-- // var x = document.getElementsByName("fname"); --}}

                {{-- @endforeach --}}
                $('.steps').parent().addClass('active');
            @endif
        </script>
    </body>
</html>