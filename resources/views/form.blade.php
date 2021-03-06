@extends('layout')

@section('title', 'Регистрация пользователя')

@section('content')
    <section>
        @if(Session::has('user_added'))
            <div class="alert alert-success" role="alert">
                {{ Session::get('user_added') }}
            </div>
        @endif
    <div class="row mt-3">
        <div class="col">
            <a class="btn btn-secondary" type="button" href="{{ route('users.all') }}">Users</a>
        </div>
    </div>
    <form method="POST" action="{{ route('user.store') }}" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col">
                <input name="name"
                       value="{{ old('name', isset($user) ? $user->name : null ) }}"
                       type="text" class="form-control" placeholder="Name" aria-label="name">
                @error('name')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="row mt-3">
            <div class="col">
                <input name="surname"
                       value="{{ old('surname', isset($user) ? $user->surname : null) }}"
                       type="text" class="form-control" placeholder="surname" aria-label="surname">
                @error('surname')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="row mt-3">
            <div class="col">
                <input name="phone_number"
                       value="{{ old('phone_number', isset($user) ? $user->phone_number : null) }}"
                       type="number" class="form-control" placeholder="phone_number" aria-label="phone_number">
                @error('phone_number')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="row mt-3">
            <div class="col">
                <input name="email"
                       value="{{ old('email', isset($user) ? $user->email : null) }}"
                       type="text" class="form-control" placeholder="Email" aria-label="email">
                @error('email')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="row mt-3">
            <div class="col">
                <label for="">Monthly subscription</label>
                <select name="monthly_subscription" id="monthly_subscription"> <!--Supplement an id here instead of using 'name'-->
                    <option value="subscription_1" selected>Subscription 1</option>
                    <option value="subscription_2">Subscription 2</option>
                </select>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col">
                <label for="">Discount rate for a year</label>
                <select name="discount_rate_for_a_year" id="discount_rate_for_a_year"> <!--Supplement an id here instead of using 'name'-->
                    <option value="{{ null }}" selected>No</option>
                    <option value="Discount_1">Discount 1</option>
                    <option value="Discount_2">Discount 2</option>
                </select>
            </div>
        </div>
        <div class="row mt-5 text-center">
            <div class="col">
                <button type="submit" class="btn btn-success">Сохранить</button>
            </div>
        </div>
    </form>
    </section>
    <script>
        function previewFile(input) {
            var file = $("input[type=file]").get(0).files[0];
            if (file){
                var reader = new FileReader();
                reader.onload = function () {
                    $('#previewImg').attr("src", reader.result);
                }
                reader.readAsDataURL(file);
            }
        }
    </script>
@endsection
