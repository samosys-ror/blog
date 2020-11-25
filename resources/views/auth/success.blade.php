@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Your Email Verification') }}</div>

                <div class="card-body">
                   
                        <div class="alert alert-success" role="alert">
                            {{ __("Verification is successfully. Please wait while our support team approves you") }}
                        </div>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
