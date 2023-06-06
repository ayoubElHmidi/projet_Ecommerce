
    <!-- Left Panel -->
    @include('fireshop.admin.nav')
    <!-- /header -->
        <!-- Header-->

        
        <div class="content">
            <div class="animated fadeIn">
                <div class="row">
                    <div class="col-lg-12">
                        <form action="{{ route("addCat") }}" method="post" enctype="multipart/form-data" class="form-horizontal">
                            @csrf
                            <div class="card">
                                <div class="card-header">
                                    <strong>Ajouter Categorie</strong>
                                </div>
                                <div class="card-body card-block">
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="text-input" class="form-control-label">Nom :</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <input type="text" id="text-input" name="nomCat" value="" class="form-control">
                                        </div>
                                        @error('nomCat')
                                            {{$message}}
                                        @enderror
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="textarea-input" class="form-control-label">Description :</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <textarea name="descriptionCat" id="textarea-input" value="" rows="9" class="form-control"></textarea>
                                        </div>
                                        @error('descriptionCat')
                                            {{$message}}
                                        @enderror
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="password-input" class="form-control-label">Illustration :</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <input type="file" id="file-input" name="photoCat" class="form-control-file">
                                        </div>
                                        @error('photoCat')
                                            {{$message}}
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary btn-sm">
                                    <i class="ti-save"></i> save
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
<script src="assets/js/main.js"></script>


</body>
</html>