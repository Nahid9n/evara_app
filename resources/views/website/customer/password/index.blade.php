@extends('website.customer.layout.app')
@section('title','Customer Password')
@section('body')
    <div class="">
        <div class="card">
            <div class="card-header">
                <h5>Change Password</h5>
            </div>
            <div class="card-body">
                <form method="post" action="{{ route('customer.password.change' , auth()->user()->id) }}" name="enq">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="form-group col-md-12 my-2">
                            <label class="my-2">Current Password <span class="text-danger">*</span></label>
                            <input class="form-control square" name="old_password" type="password" autocomplete="off" placeholder="current password" required>
                        </div>
                        <div class="form-group col-md-12 my-2">
                            <label class="my-2">New Password <span class="text-danger">*</span></label>
                            <input class="form-control square" name="new_password" type="password" placeholder="new password" required>
                        </div>
                        <div class="form-group col-md-12 my-2">
                            <label class="my-2">Confirm New Password <span class="text-danger">*</span></label>
                            <input class="form-control square" name="confirm_password" type="password" placeholder="confirm new password" required>
                        </div>
                        <div class="col-md-12 my-3">
                            <button type="submit" onclick="return confirm('are you sure to change password ?')" class="btn btn-success px-5 submit">Save</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

