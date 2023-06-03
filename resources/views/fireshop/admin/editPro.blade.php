    <!-- Left Panel -->
    @include('fireshop.admin.nav')
    <!-- /header -->
        <!-- Header-->

        
        <div class="content">
            <div class="animated fadeIn">
                <div class="row">
                    <div class="col-lg-12">

                        <form action="{{ route('updatePro', ['product' => $product->idPro]) }}" method="get" enctype="multipart/form-data" class="form-horizontal">

                            @csrf
                            <div class="card">
                                <div class="card-header">
                                    <strong>update Produit</strong>
                                </div>
                                <div class="card-body card-block">
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="text-input" class="form-control-label">Nom :</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <input type="text" id="text-input" name="nomPro" value="{{ old('nomPro', $product->nomPro ??null) }}" class="form-control">
                                        </div>
                                    </div>
                                    @error('nomPro')
                                        {{$message()}}
                                    @enderror
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="textarea-input" class="form-control-label">Description :</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <textarea name="descriptionPro" id="textarea-input"  rows="9" class="form-control">{{ old('descriptionPro', $product->descriptionPro??null) }}</textarea>
                                        </div>
                                    </div>
                                    @error('descriptionPro')
                                        {{$message()}}
                                    @enderror
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="password-input" class="form-control-label">Illustration :</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <input type="file" id="file-input" name="photo" class="form-control-file" >
                                        </div>
                                    </div>
                                    
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="text-input" class="form-control-label">qte Produit :</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <input type="text" id="text-input" name="qtePro" value="{{ old('qtePro', $product->qtePro??null) }}" class="form-control">
                                        </div>
                                    </div>
                                    @error('qtePro')
                                        {{$message()}}
                                    @enderror
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="text-input" class="form-control-label">Prix :</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <input type="text" id="text-input" name="prixPro" value="{{ old('prixPro', $product->prixPro??null) }}" class="form-control">
                                        </div>
                                    </div>
                                    @error('prixPro')
                                        {{$message()}}
                                    @enderror
                                    <x-input-error :messages="$errors->get('message')" class="mt-2" />
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="select" class="form-control-label">Categorie :</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <select name="idCat" id="select" class="form-control">
                                                @foreach ($categorie as $item)
                                                    <option value="{{$item->idCat}}">{{$item->nomCat}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    @error('idCat')
                                        {{$message()}}
                                    @enderror
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="select" class="form-control-label">Color :</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <select name="color" id="select" class="form-control">
                                                <option value="Green">Green</option>
                                                <option value="Blue">Blue</option>
                                                <option value="Red">Red</option>
                                                <option value="White">White</option>
                                                <option value="Black">Black</option>
                                            </select>
                                        </div>
                                    </div>
                                    @error('color')
                                        {{$message()}}
                                    @enderror
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="select" class="form-control-label">Select</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <select name="size" id="select" class="form-control">
                                                <option value="XS">XS</option>
                                                <option value="S">S</option>
                                                <option value="M">M</option>
                                                <option value="L">L</option>
                                                <option value="XL">XL</option>
                                            </select>
                                        </div>
                                    </div>
                                    @error('size')
                                        {{$message()}}
                                    @enderror
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
<script src="assets/js/main.js"></script>


</body>
</html>
