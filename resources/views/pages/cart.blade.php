@extends('layouts.app')

@section('title')
    Sneakersaja - Cart
@endsection

@section('content')
    <div class="page-content page-detail">
        <section class="store-breadcrumb" data-aos="fade-down">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <nav>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="{{ route('homepage') }}">Home</a>
                                </li>
                                <li class="breadcrumb-item active">Cart</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </section>

        <section class="store-cart">
            <div class="container">
                <div class="row" data-aos="fade-down" data-aos-delay="100">
                    <div class="col-12 table-responsive">
                        <table class="table table-borderless table-cart">
                            <thead>
                                <tr>
                                    <td>Image</td>
                                    <td>Name &amp; Seller</td>
                                    <td>Price</td>
                                    <td>Menu</td>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $totalPrice = 0;
                                @endphp
                                @forelse ($carts as $cart)
                                    <tr>
                                        <td>
                                            <img src="{{ Storage::url($cart->product->galleries->first()->photos) }}"
                                                class="cart-img" alt="" />
                                        </td>
                                        <td>
                                            <p class="title">{{ $cart->product->name }}</p>
                                            <p class="subtitle">by {{ $cart->user->store_name }}</p>
                                        </td>
                                        <td>
                                            <p class="title">@currency($cart->product->price)</p>
                                            <p class="subtitle">Rupiah</p>
                                        </td>
                                        <td>
                                            <form action="{{ route('cart-delete', $cart->id) }}" method="POST">
                                                @method('delete')
                                                @csrf
                                                <button type="submit" class="btn btn-cart">Remove</button>
                                            </form>

                                        </td>
                                    </tr>
                                    @php
                                        $totalPrice += $cart->product->price;
                                    @endphp
                                @empty
                                    <tr>
                                        <td class="text-center py-5" colspan="100">Keranjang Belanjanya Masih
                                            Kosong
                                            Nih😁</td>
                                    </tr>
                                @endforelse

                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="row mt-5" data-aos="fade-down" data-aos-delay="150">
                    <div class="col-12">
                        <hr />
                    </div>
                    <div class="col-12">
                        <h5>Shipping Details</h5>
                    </div>
                </div>
                <form action="{{ route('checkout') }}" method="POST" enctype="multipart/form-data" id="form-cart">
                    @csrf

                    <input type="hidden" name="total_price" id="" value="{{ $totalPrice }}">
                    <div class="row mt-4" data-aos="fade-up" data-aos-delay="100">

                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="address_one">Address 1</label>
                                <input type="text" class="form-control" required name="address_one"
                                    placeholder="ex : Kios Dina" />
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="address_two">Address 2</label>
                                <input type="text" class="form-control" required name="address_two"
                                    placeholder="ex : Blok D No.6" />
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label for="provinces_id">Province</label>
                                <select name="provinces_id" id="province_id" required v-if="provinces"
                                    v-model="provinces_id" class="form-control">
                                    <option v-for="province in provinces" :value="province.id">@{{ province.name }}
                                    </option>
                                </select>
                                <select v-else class="form-control"></select>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label for="regencies_id">City</label>
                                <select name="regencies_id" required id="regencies_id" v-if="regencies"
                                    v-model="regencies_id" class="form-control">
                                    <option v-for="regency in regencies" :value="regency.id">@{{ regency.name }}
                                    </option>
                                </select>
                                <select v-else class="form-control"></select>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label for="zip_code">Postal Code</label>
                                <input type="number" required class="form-control" name="zip_code"
                                    placeholder="ex : 40328" />
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="country">Country</label>
                                <input type="text" required class="form-control" name="country"
                                    placeholder="ex : Indonesia" />
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="phone_number">Mobile Number</label>
                                <input type="text" required class="form-control" name="phone_number"
                                    placeholder="ex : 08521092822" />
                            </div>
                        </div>


                    </div>
                    <div class="row mt-4" data-aos="fade-up" data-aos-delay="150">

                        <div class="col-12">
                            <h5>Payment Informations</h5>
                        </div>
                        <div class="col-4 col-md-2">
                            <div class="title">$10</div>
                            <div class="subtitle">Country Tax</div>
                        </div>
                        <div class="col-4 col-md-3">
                            <div class="title">$280</div>
                            <div class="subtitle">Product Insurance</div>
                        </div>
                        <div class="col-4 col-md-2">
                            <div class="title">$580</div>
                            <div class="subtitle">Ship to Jakarta</div>
                        </div>
                        <div class="col-4 col-md-2 mt-3 mt-md-0">
                            <div class="title text-success">@currency($totalPrice)</div>
                            <div class="subtitle">Total</div>
                        </div>
                        <div class="col-8 col-md-3 d-flex align-items-center mt-3 mt-md-0">
                            @php
                                $cart = \App\Models\Cart::where('users_id', Auth::user()->id)->count();
                            @endphp

                            @if ($cart > 0)
                                <button type="submit" class="btn btn-danger btn-block px-4">Checkout Now</button>
                            @else
                                <button type="#" disabled class="btn btn-danger btn-block px-4">Checkout Now</button>
                            @endif

                        </div>
                    </div>
                </form>
            </div>
        </section>
    </div>
@endsection

@push('addon-script')
    <script src="/vendor/vue/vue.js"></script>
    <script src="https://unpkg.com/vue-toasted"></script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <script>
        var app = new Vue({
            el: "#form-cart",
            mounted() {
                AOS.init();
                this.getProvincesData();
            },
            data: {
                provinces: null,
                regencies: null,
                provinces_id: null,
                regencies_id: null
            },
            methods: {
                getProvincesData() {
                    var self = this
                    axios.get('{{ route('province') }}')
                        .then(function(response) {
                            self.provinces = response.data
                        })
                },
                getRegenciesData() {
                    var self = this
                    axios.get('{{ url('api/regencies') }}/' + self.provinces_id)
                        .then(function(response) {
                            self.regencies = response.data
                        })
                },
            },
            watch: {
                provinces_id: function(val, oldVal) {
                    this.regencies_id = null;
                    this.getRegenciesData();
                }
            }
        });
    </script>
    <script src="/script/navbar.js"></script>
@endpush
