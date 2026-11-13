@extends('Layout.app')

@section('title', 'Tambah Member - Court 90')

@section('content')
<div class="container">
  <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-3 mb-4">
    <div>
      <h1 class="h3 fw-black text-dark text-uppercase mb-1" style="letter-spacing: -0.5px;">
        Tambah Member Baru
      </h1>
    </div>
    <div>
      <a href="{{ route('pelanggan.index') }}" class="btn sport-btn-outline px-3 py-2 fw-bold border-dark text-dark"
        style="background-color: #ffffff; border: 2.5px solid #111827; box-shadow: 3px 3px 0 #111827;">
        <i class="bi bi-arrow-left me-1"></i> Kembali ke Tabel
      </a>
    </div>
  </div>

  <div class="row justify-content-center">
    <div class="col-12 col-lg-8">
      <div class="sport-static-card bg-white p-4 p-md-5 overflow-hidden">

        <form action="{{ route('pelanggan.store') }}" method="POST">
          @csrf

          <div class="mb-3">
            <label for="inputNama" class="form-label fw-bold text-uppercase small text-dark opacity-75 mb-1">Nama Lengkap</label>
            <input type="text" class="form-control sport-input p-2 border-2 border-dark" id="inputNama" name="nama" placeholder="Masukkan nama pelanggan..." required>
          </div>

          <div class="row mb-3">
            <div class="col-md-6 mb-3 mb-md-0">
              <label for="inputKategori" class="form-label fw-bold text-uppercase small text-dark opacity-75 mb-1">Kategori Tier</label>

              <select class="form-select sport-input p-2 border-2 border-dark" id="inputKategori" name="kategoti" required>
                <option value="" selected disabled>-- Pilih Tier --</option>
                <option value="Bronze">Bronze</option>
                <option value="Silver">Silver</option>
                <option value="Gold">Gold</option>
              </select>
            </div>
            <div class="col-md-6">
              <label for="inputKontak" class="form-label fw-bold text-uppercase small text-dark opacity-75 mb-1">Kontak Telepon</label>
              <input type="text" class="form-control sport-input p-2 border-2 border-dark" id="inputKontak" name="kontak" placeholder="Contoh: 081234567890" required>
            </div>
          </div>

          <hr class="border-dark border-2 my-4 opacity-100">

          <div class="d-flex justify-content-end gap-2">
            <button type="reset" class="btn sport-btn-outline px-4">Reset</button>
            <button type="submit" class="btn sport-btn-primary px-5" style="background-color: #FF6B35; border: 2px solid #111827;">
              <i class="bi bi-save2-fill me-1"></i> Simpan Data
            </button>
          </div>
        </form>

      </div>
    </div>
  </div>
</div>
@endsection
