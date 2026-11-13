@extends('Layout.app')

@section('title', 'Register - Court 90')

@section('content')
<div class="container my-5">
  <div class="row justify-content-center">
    <div class="col-md-5">
      <div class="sport-static-card bg-white p-4" style="border: 2.5px solid #111827; box-shadow: 5px 5px 0 #111827; border-radius: 10px;">
        <h3 class="fw-black text-dark text-uppercase text-center mb-4">Register Member</h3>

        <form action="{{ route('register.post') }}" method="POST">
          @csrf
          <div class="mb-3">
            <label class="form-label fw-bold text-uppercase small">Nama Lengkap</label>
            <input type="text" name="name" class="form-control sport-input border-2 border-dark" value="{{ old('name') }}" required>
            @error('name') <span class="text-danger small">{{ $message }}</span> @enderror
          </div>

          <div class="mb-3">
            <label class="form-label fw-bold text-uppercase small">Email</label>
            <input type="email" name="email" class="form-control sport-input border-2 border-dark" value="{{ old('email') }}" required>
            @error('email') <span class="text-danger small">{{ $message }}</span> @enderror
          </div>

          <div class="mb-3">
            <label class="form-label fw-bold text-uppercase small">Password</label>
            <input type="password" name="password" class="form-control sport-input border-2 border-dark" required>
            @error('password') <span class="text-danger small">{{ $message }}</span> @enderror
          </div>

          <button type="submit" class="btn sport-btn-primary w-100 py-2 fw-bold text-white" style="background-color: #FF6B35; border: 2px solid #111827;">Daftar Sekarang</button>
        </form>

        <p class="text-center small mt-3 mb-0">Sudah punya akun? <a href="{{ route('login') }}" class="fw-bold text-dark">Login</a></p>
      </div>
    </div>
  </div>
</div>
@endsection
