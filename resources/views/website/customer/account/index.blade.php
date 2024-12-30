@extends('website.master')
@section('title','Customer Account Details')
@section('body')
    <section class="mt-2 mb-50">
        <div class="container">
            @include('website.customer.layout.sidebar')
            <div class="">
                <div class="card">
                    <div class="card-header">
                        <h5>Account Details</h5>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{ route('update.customer.info' , auth()->user()->id) }}" name="enq" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="form-group col-md-12 text-center">
                                    <img style=" max-width: 200px; width: 100%; height: auto;" src="{{ asset($customer->image) }}" alt="">
                                </div>
                                <div class="form-group col-md-12">
                                    <label>Image</label>
                                    <input class="form-control square" name="image" type="file">
                                    <input name="old_image" value="{{ $customer->image }}" type="hidden">
                                </div>
                                <div class="form-group col-md-12">
                                    <label>Display Name</label>
                                    <input class="form-control square" name="name" type="text" value="{{ auth()->user()->name }}">
                                </div>

                                <div class="form-group col-md-6">
                                    <label>Phone</label>
                                    <input class="form-control square" name="mobile" type="number" min="0" value="{{ $customer->mobile }}">
                                </div>

                                <div class="form-group col-md-6">
                                    <label>Company</label>
                                    <input class="form-control square" name="company" type="text" value="{{ $customer->company }}">
                                </div>

                                <div class="form-group col-md-12">
                                    <label>Address</label>
                                    <input class="form-control square" name="address" type="text" value="{{ $customer->address }}">
                                </div>

                                <div class="form-group col-md-6">
                                    <label>Gender</label>
                                    <select class="form-control square" name="gender">
                                        <option value="">Select</option>
                                        <option value="Male" {{$customer->gender == 'Male' ? 'selected' : ''}}>Male</option>
                                        <option value="Female" {{$customer->gender == 'Female' ? 'selected' : ''}}>Female</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-6">
                                    <label>marital status</label>
                                    <select class="form-control square" name="marital_status">
                                        <option value="">Select</option>
                                        <option value="1" {{$customer->marital_status == '1' ? 'selected' : ''}}>Single</option>
                                        <option value="2" {{$customer->marital_status == '2' ? 'selected' : ''}}>Married</option>
                                    </select>
                                </div>

                                <div class="form-group col-md-6">
                                    <label>Blood Group</label>
                                    <select class="form-control square" name="blood_group">
                                        <option value="">Select</option>
                                        <option value="A+" {{$customer->blood_group == 'A+' ? 'selected' : ''}}>A+</option>
                                        <option value="A-" {{$customer->blood_group == 'A-' ? 'selected' : ''}}>A-</option>
                                        <option value="B+" {{$customer->blood_group == 'B+' ? 'selected' : ''}}>B+</option>
                                        <option value="B-" {{$customer->blood_group == 'B-' ? 'selected' : ''}}>B-</option>
                                        <option value="O+" {{$customer->blood_group == 'O+' ? 'selected' : ''}}>O+</option>
                                        <option value="O-" {{$customer->blood_group == 'O-' ? 'selected' : ''}}>O-</option>
                                        <option value="AB+" {{$customer->blood_group == 'AB+' ? 'selected' : ''}}>AB+</option>
                                        <option value="AB-" {{$customer->blood_group == 'AB-' ? 'selected' : ''}}>AB-</option>
                                    </select>
                                </div>

                                <div class="form-group col-md-6">
                                    <label>State</label>
                                    <input class="form-control square" name="state" type="text" value="{{ $customer->state }}">
                                </div>

                                <div class="form-group col-md-6">
                                    <label>Post</label>
                                    <input class="form-control square" name="post" type="number" value="{{ $customer->post }}">
                                </div>

                                <div class="form-group col-md-6">
                                    <label>Country</label>
                                    <input class="form-control square" name="country" type="text" value="{{ $customer->country }}">
                                </div>

                                <div class="form-group col-md-6">
                                    <label>SSN</label>
                                    <input class="form-control square" name="ssn" type="text" value="{{ $customer->ssn }}">
                                </div>

                                <div class="form-group col-md-6">
                                    <label>City</label>
                                    <input class="form-control square" name="city" type="text" value="{{ $customer->city }}">
                                </div>

                                <div class="form-group col-md-6">
                                    <label>Email Address</label>
                                    <input class="form-control square" name="email" type="email" value="{{ auth()->user()->email }}" readonly>
                                </div>

                                <div class="form-group col-md-6">
                                    <label>website Address</label>
                                    <input class="form-control square" name="website" type="url" value="{{ $customer->website }}">
                                </div>
                                <div class="form-group col-md-6">
                                    <label>facebook</label>
                                    <input class="form-control square" name="facebook" type="url" value="{{ $customer->facebook }}">
                                </div>
                                <div class="form-group col-md-6">
                                    <label>linkedIn</label>
                                    <input class="form-control square" name="linkedIn" type="url" value="{{ $customer->linkedIn }}">
                                </div>
                                <div class="form-group col-md-6">
                                    <label>twitter</label>
                                    <input class="form-control square" name="twitter" type="url" value="{{ $customer->twitter }}">
                                </div>
                                <div class="form-group col-md-6">
                                    <label>youtube</label>
                                    <input class="form-control square" name="youtube" type="url" value="{{ $customer->youtube }}">
                                </div>
                                <div class="form-group col-md-6">
                                    <label>instagram</label>
                                    <input class="form-control square" name="instagram" type="url" value="{{ $customer->instagram }}">
                                </div>

                                <div class="form-group col-md-6">
                                    <label>Date of Birth</label>
                                    <input class="form-control square" name="dob" type="date" value="{{ $customer->date_of_birth }}">
                                </div>

                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-fill-out submit">Save</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection

