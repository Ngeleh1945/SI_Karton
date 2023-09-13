@extends('layouts.index')

@section('content')

@section('head')
<title>Register</title>
<link rel="stylesheet" href="{{ asset('css/register.css') }}">
@endsection


@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif


@include('modal.registersuccess')
<div class="container-login">
    <div class="row justify-content-center">
        <div class="col-xl-10 col-lg-12 col-md-9">
            <div class="card shadow-sm my-5">
                <div class="card-body p-0">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="login-form">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4">Create New User Account</h1>
                                </div>
                                <form action="{{ route('createUserAccount') }}" method="POST">
                                    @csrf

                                    <label for="nik">NIK:</label>
                                    <input type="text" id="nik" name="nik" pattern="[0-9]*" inputmode="numeric">
                                    <script>
                                        document.getElementById("nik").addEventListener("input", function() {
                                            this.value = this.value.replace(/[^0-9]/g, '');
                                        });
                                    </script>
                                    <br>

                                    <label for="nama">Nama:</label>
                                    <input type="text" id="nama" name="nama">
                                    <br>

                                    <label for="jabatan">Jabatan:</label>
                                    <select id="jabatan" name="jabatan">
                                        <option value="">--Silakan pilih posisi jabatan--</option>
                                        <option value="Supervisor">Supervisor</option>
                                        <option value="Kasie">Kasie</option>
                                        <option value="Admin">Admin</option>
                                        <option value="Operator">Operator</option>
                                    </select>
                                    <span id="jabatan-error" style="color: red;"></span>

                                    <script>
                                        const jabatanSelect = document.getElementById("jabatan");
                                        const jabatanError = document.getElementById("jabatan-error");

                                        jabatanSelect.addEventListener("change", function() {
                                            if (this.value === "") {
                                                jabatanError.textContent = "Silakan pilih posisi jabatan.";
                                            } else {
                                                jabatanError.textContent = "";
                                            }
                                        });
                                    </script>
                                    <br>

                                    <label for="username">Username:</label>
                                    <input type="text" id="username" name="username">
                                    <span id="username-error" style="color: red;"></span>

                                    <script>
                                        const usernameInput = document.getElementById("username");
                                        const usernameError = document.getElementById("username-error");

                                        usernameInput.addEventListener("input", function() {
                                            const usernameValue = this.value;

                                            if (/^\d+$/.test(usernameValue)) {
                                                usernameError.textContent = "Username tidak boleh hanya terdiri dari angka.";
                                            } else if (usernameValue.length <= 6 || !/^[a-zA-Z0-9]+$/.test(usernameValue)) {
                                                usernameError.textContent = "Username harus terdiri dari minimal 6 karakter (huruf dan angka).";
                                            } else {
                                                usernameError.textContent = "";
                                            }
                                        });
                                    </script>
                                    <br>

                                    <label for="password">Password:</label>
                                    <input type="password" id="password" name="password">
                                    <br>
                                    <label for="repeat_password">Repeat Password:</label>
                                    <input type="password" id="repeat_password" name="repeat_password">
                                    <span id="repeat_password-error" style="color: red;"></span>
                                    <br>

                                    <button type="submit">Create User</button>
                                    @if (Session::has('success'))
                                    <script>
                                        $(document).ready(function() {
                                            $('#success').modal('show');
                                            $('#okButton').click(function() {
                                                window.location.href = '{{ route("register") }}';
                                            });
                                        });
                                    </script>
                                    @endif
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="{{ asset('js/validation.js') }}"></script>
@endsection