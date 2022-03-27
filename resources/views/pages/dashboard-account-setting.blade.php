@extends('layouts.dashboard')

@section('title')
    Dashboard - Account Setting
@endsection

@section('content')
    <div class="section-content section-dashboard-home" data-aos="fade-up">
        <div class="container-fluid">
            <div class="dashboard-heading">
                <h2 class="dashboard-title">My Account</h2>
                <p class="dashboard-subtitle">Update your current profile</p>
            </div>

            <div class="dashboard-content mt-4 mt-ld-5">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('dashboard-redirect-setting', 'dashboard-account-setting') }}"
                            id="form-cart" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="name">Full Name</label>
                                        <input type="text" name="name" value="{{ $user->name }}" class="form-control" />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="email">Email Address</label>
                                        <input type="email" name="email" value="{{ $user->email }}"
                                            class="form-control" />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="address_one">Address 1</label>
                                        <input type="text" name="address_one" value="{{ $user->address_one }}"
                                            class="form-control" />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="address_two">Address 2</label>
                                        <input type="text" name="address_two" value="{{ $user->address_two }}"
                                            class="form-control" />
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label for="provinces_id">Province</label>
                                        <select name="provinces_id" id="province_id" required v-if="provinces"
                                            v-model="provinces_id" class="form-control">
                                            <option v-for="province in provinces" :value="province.id">
                                                @{{ province.name }}
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
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="zip_code">Postal Code</label>
                                        <input type="number" name="zip_code" value="{{ $user->zip_code }}"
                                            class="form-control" />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="country">Country</label>
                                        <input type="text" name="country" value="{{ $user->country }}"
                                            class="form-control" />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="phone_number">Phone Number</label>
                                        <input type="text" name="phone_number" value="{{ $user->phone_number }}"
                                            class="form-control" />
                                    </div>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-success px-5 mt-3">
                                Save
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
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
