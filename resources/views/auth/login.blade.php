@extends('layouts.app')

@section('content')
    <div class="container-scroller">
        <div class="container-fluid page-body-wrapper full-page-wrapper">
            <div class="content-wrapper d-flex align-items-center auth auth-bg-1 theme-one">
                <div class="row w-100">
                    <div class="col-lg-4 mx-auto">
                        <div class="auto-form-wrapper" id="login_div">

                            <form method="POST" action="{{ route('login') }}">
                                @csrf
                                <a href="{{ route('google_login') }}" class="btn-2 btn-google btn-user btn-block-2">
                                    <i class="bi bi-google"></i> Login with Google
                                </a>

                                <div class="text-block text-center my-3">
                                    <span class="text-small font-weight-semibold">You are an admin ?</span>
                                    <a href="admin_login" class="text-black text-small">Login</a>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
    
            <!-- content-wrapper ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
@endsection