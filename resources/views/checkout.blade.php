
@include('layouts.navbarhome')
<body>

    <!-- Topbar Start -->


    <div class="container-fluid bg-secondary mb-5">
        <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 300px">
            <h1 class="font-weight-semi-bold text-uppercase mb-3">Checkout</h1>
            <div class="d-inline-flex">
                <p class="m-0"><a href="">Home</a></p>
                <p class="m-0 px-2">-</p>
                <p class="m-0">Checkout</p>
            </div>
        </div>
    </div>
    <!-- Page Header End -->


    <!-- Checkout Start -->
    <form action="{{ route('placeOrder') }}" method="POST">
    <div class="container-fluid pt-5">
        <div class="row px-xl-5">
            <div class="col-lg-8">
                <div class="mb-4">
                    <h4 class="font-weight-semi-bold mb-4">Billing Address</h4>
                    <div class="row">
                        <div class="col-md-6 form-group">
                            <label>First Name</label>
                            <input class="form-control" type="text" name="firstName" placeholder="John" value="{{ old('firstName') }}">
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Last Name</label>
                            <input class="form-control" type="text" name="lastName" placeholder="Doe" value="{{ old('lastName') }}">
                        </div>
                        <div class="col-md-6 form-group">
                            <label>E-mail</label>
                            <input class="form-control" type="text" name="email" placeholder="example@email.com" value="{{ old('email') }}">
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Mobile No</label>
                            <input class="form-control" type="text" name="mobileNo" placeholder="+123 456 789" value="{{ old('mobileNo') }}">
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Address Line 1</label>
                            <input class="form-control" type="text" name="addressLine1" placeholder="123 Street" value="{{ old('addressLine1') }}">
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Address Line 2</label>
                            <input class="form-control" type="text" name="addressLine2" placeholder="123 Street" value="{{ old('addressLine2') }}">
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Country</label>
                            <select class="custom-select" name="country">
                                <option selected>United States</option>
                                <option>Afghanistan</option>
                                <option>Albania</option>
                                <option>Algeria</option>
                            </select>
                        </div>
                        <div class="col-md-6 form-group">
                            <label>City</label>
                            <input class="form-control" type="text" name="city" placeholder="New York" value="{{ old('city') }}">
                        </div>
                        <div class="col-md-6 form-group">
                            <label>State</label>
                            <input class="form-control" type="text" name="state" placeholder="New York" value="{{ old('state') }}">
                        </div>
                        <div class="col-md-6 form-group">
                            <label>ZIP Code</label>
                            <input class="form-control" type="text" name="zipCode" placeholder="123" value="{{ old('zipCode') }}">
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-4">
                <div class="card border-secondary mb-5">
                    <div class="card-header bg-secondary border-0">
                        <h4 class="font-weight-semi-bold m-0">Order Total</h4>
                    </div>
                    <div class="card-body">
                        <h5 class="font-weight-medium mb-3">Products</h5>
                        @foreach ($panier as $produit)
                        <div class="d-flex justify-content-between">
                            <p>{{ $produit->nomPro }}</p>
                            <p>{{ $produit->prixPro }}</p>
                        </div>
                        @endforeach
                        <hr class="mt-0">
                        <div class="d-flex justify-content-between mb-3 pt-1">
                            <h6 class="font-weight-medium">Subtotal</h6>
                            <h6 class="font-weight-medium">{{ $totalCommande }}</h6>
                        </div>
                        <div class="d-flex justify-content-between">
                            <h6 class="font-weight-medium">Shipping</h6>
                            <h6 class="font-weight-medium">$10</h6>
                        </div>
                    </div>
                    <div class="card-footer border-secondary bg-transparent">
                        <div class="d-flex justify-content-between mt-2">
                            <h5 class="font-weight-bold">Total</h5>
                            <h5 class="font-weight-bold">{{ $totalCommande + 10 }}</h5>
                        </div>
                    </div>
                </div>
                <div class="card border-secondary mb-5">
 
                    <div class="card-body">
                        <!-- Vos options de paiement -->
                    </div>
                    <div class="card-footer border-secondary bg-transparent">
                        
                            @csrf
                            <!-- ... Votre formulaire ... -->
                            <button class="btn btn-lg btn-block btn-primary font-weight-bold my-3 py-3" type="submit">Place Order</button>
                        </form>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
    <!-- Checkout End -->


@extends('layouts.Footre')