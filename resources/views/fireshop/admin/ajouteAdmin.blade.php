
    <!-- Left Panel -->
    @include('fireshop.admin.nav')
    <!-- /header -->
        <!-- Header-->
        <div class="content">
            <div class="animated fadeIn">
                <div class="row">
                    <div class="col-lg-8">
                        <form action="{{ route('admin.store') }}" method="post" enctype="multipart/form-data" class="form-horizontal">
                            @csrf
                        <div class="card">
                            <div class="card-header">
                                <strong>Ajouter un nouvel administrateur</strong>
                            </div>
                            <div class="card-body card-block">
                                
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="text-input" class=" form-control-label">Nom :</label></div>
                                        <div class="col-12 col-md-9"><input type="text" id="text-input" @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus class="form-control">
                                            @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>

                                    </div>
                                    
                                    
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="text-input" class=" form-control-label">Adresse e-mail :</label></div>
                                        <div class="col-12 col-md-9"><input type="email" id="text-input" @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" class="form-control">
                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>


                                    <div class="row form-group">
                                        <div class="col col-md-3"><x-input-label for="password" :value="__('Password')" /></div>
                                        <div class="col-12 col-md-9"><x-text-input id="password" class="form-control"
                                            type="password"
                                            name="password"
                                            required autocomplete="new-password" />
                
                                        <x-input-error :messages="$errors->get('password')" class="mt-2" /></div>
                                        </div>
                                    </div>

                                    <div class="row form-group">
                                        <div class="col col-md-3"><x-input-label for="password_confirmation" :value="__('Confirm Password')" /></div>
                                        <div class="col-12 col-md-9"><x-text-input id="password_confirmation" class="form-control"
                                                        type="password"
                                                        name="password_confirmation" required autocomplete="new-password" />
                            
                                        <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                                        </div>
                                    </div>


                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary btn-sm">
                                    <i class="fa fa-dot-circle-o"></i> Submit
                                </button>
                                <a href="{{ route('admin') }}" class="btn btn-danger btn-sm">
                                    <i class="fa fa-ban"></i> Retour
                                </a>
                            </div>
                        </form>
                        </div>
                    
                    </div>
                </div>
            </div>
        </div><!-- .animated -->
    </div><!-- .content -->

    <div class="clearfix"></div>



</div><!-- /#right-panel -->

<!-- Right Panel -->

<!-- Scripts -->
<script src="https://cdn.jsdelivr.net/npm/jquery@2.2.4/dist/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.4/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery-match-height@0.7.2/dist/jquery.matchHeight.min.js"></script>
<script src="{{ asset('assets/js/main.js') }}"></script>



</body>
</html>
