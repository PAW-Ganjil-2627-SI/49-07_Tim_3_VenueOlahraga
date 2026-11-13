@extends('Layout.app')

@section('title', 'Profil & Edit Member - Court 90')

@section('content')
<div class="container">

  <!-- Header Navigasi -->
  <div class="d-flex flex-column flex-sm-row justify-content-between align-items-sm-center gap-2 mb-4">
    <div>
      <h1 class="h3 fw-black text-dark text-uppercase mb-0">Kelola Profil Member</h1>
    </div>
    <div>
      <a href="{{ route('pelanggan.index') }}" class="btn sport-btn-outline px-3 py-2 fw-bold border-dark text-dark" style="background-color: #ffffff; border: 2.5px solid #111827; box-shadow: 3px 3px 0 #111827;">
        <i class="bi bi-arrow-left me-1"></i> Kembali ke Tabel
      </a>
    </div>
  </div>

  <div class="row g-4">

    <div class="col-12 col-lg-4">
      <div class="sport-static-card overflow-hidden text-center position-relative bg-white" style="border: 2.5px solid #111827; box-shadow: 5px 5px 0 #111827; border-radius: 10px;">

        <!-- Top Card Ribbon -->
        <div class="retro-olympic-stripe" style="height: 8px;"></div>

        <div class="p-4">
          <div class="d-inline-block px-3 py-1 rounded-pill mb-3 font-monospace fw-black small text-uppercase"
               style="background-color: #ECA72C; color: #111827; border: 1.5px solid #111827; box-shadow: 2px 2px 0 #111827;">
            ★ OFFICIAL ATHLETE CARD ★
          </div>

          @php
            $namaMember = $data->nama ?? $data['nama'] ?? 'Member';
            $words = explode(' ', $namaMember);
            $initials = strtoupper(substr($words[0], 0, 1) . (isset($words[1]) ? substr($words[1], 0, 1) : ''));
            $kategoriVal = $data->kategoti ?? $data['kategoti'] ?? 'Bronze';
          @endphp

          <div class="rounded-circle text-white fw-bold d-inline-flex align-items-center justify-content-center fs-1 mx-auto mb-3"
               style="width: 88px; height: 88px; background-color: #FF6B35; border: 3px solid #111827; box-shadow: 4px 4px 0 #111827;">
            {{ $initials }}
          </div>

          <h3 class="fw-black text-dark mb-1 sport-heading">{{ $namaMember }}</h3>

          <!-- Badge Divisi Member -->
          <div class="my-2">
            <span class="badge sport-badge px-3 py-2 fs-6" style="background-color: #004E98; color: #ffffff; border: 1.5px solid #111827; box-shadow: 2px 2px 0 #111827;">
              <i class="bi bi-trophy-fill me-1" style="color: #ECA72C;"></i> {{ $kategoriVal }} Member
            </span>
          </div>

          <hr class="my-3 border-2 border-dark opacity-100">

          <!-- Informasi Paspor Atlet -->
          <div class="text-start small fw-bold">
            <div class="d-flex justify-content-between py-2 border-bottom border-dark border-opacity-25">
              <span class="text-dark opacity-75 text-uppercase">No. Kartu / ID:</span>
              <span class="font-monospace px-2 py-0.5 rounded text-dark" style="background-color: #F4F1E1; border: 1.5px solid #111827;">
                {{ $data->id ?? $data['id'] ?? '-' }}
              </span>
            </div>
            <div class="d-flex justify-content-between py-2">
              <span class="text-dark opacity-75 text-uppercase">Kontak Telepon:</span>
              <span class="text-dark">{{ $data->kontak ?? $data['kontak'] ?? '-' }}</span>
            </div>
          </div>
        </div>

      </div>
    </div>

    <!-- KOLOM 2: FORMULIR ATLET & KEANGGOTAAN -->
    <div class="col-12 col-lg-8">
      <div class="sport-static-card bg-white p-3 p-md-4 overflow-hidden" style="border: 2.5px solid #111827; box-shadow: 5px 5px 0 #111827; border-radius: 10px;">

        <div class="d-flex justify-content-between align-items-center mb-3 pb-2 border-bottom border-2 border-dark">
          <h4 class="fw-black text-dark mb-0 text-uppercase sport-heading">
            <i class="bi bi-pencil-square me-1" style="color: #FF6B35;"></i> Form Roster & Perubahan Atlet
          </h4>
        </div>

        {{-- Form Update --}}
        <form action="{{ route('pelanggan.update', $data->id ?? $data['id']) }}" method="POST">
          @csrf
          @method('PUT')

          <div class="row g-3">

            <!-- ID Kartu Member (Readonly) -->
            <div class="col-12 col-md-6">
              <label for="id" class="form-label fw-bold text-dark text-uppercase small">No. Kartu / ID Member</label>
              <input type="text" class="form-control sport-input p-2 border-2 border-dark bg-light" id="id" name="id" value="{{ $data->id ?? $data['id'] ?? '' }}" readonly>
            </div>

            <!-- Nama Lengkap -->
            <div class="col-12 col-md-6">
              <label for="nama" class="form-label fw-bold text-dark text-uppercase small">Nama Lengkap Atlet <span class="text-danger">*</span></label>
              <input type="text" class="form-control sport-input p-2 border-2 border-dark" id="nama" name="nama" value="{{ $data->nama ?? $data['nama'] ?? '' }}" required>
            </div>

            <!-- Kategori Tier -->
            <div class="col-12 col-md-6">
              <label for="kategoti" class="form-label fw-bold text-dark text-uppercase small">Tingkatan Kategori Member <span class="text-danger">*</span></label>
              <select class="form-select sport-input p-2 border-2 border-dark" id="kategoti" name="kategoti" required>
                <option value="Bronze" {{ $kategoriVal == 'Bronze' ? 'selected' : '' }}>Bronze Tier</option>
                <option value="Silver" {{ $kategoriVal == 'Silver' ? 'selected' : '' }}>Silver Tier</option>
                <option value="Gold" {{ $kategoriVal == 'Gold' ? 'selected' : '' }}>Gold Tier</option>
              </select>
            </div>

            <!-- Kontak Telepon -->
            <div class="col-12 col-md-6">
              <label for="kontak" class="form-label fw-bold text-dark text-uppercase small">No. Telepon / WhatsApp <span class="text-danger">*</span></label>
              <input type="text" class="form-control sport-input p-2 border-2 border-dark" id="kontak" name="kontak" value="{{ $data->kontak ?? $data['kontak'] ?? '' }}" required>
            </div>

          </div>

          <!-- Tombol Aksi Simpan -->
          <div class="d-flex justify-content-end gap-2 mt-4 pt-3 border-top border-2 border-dark">
            <button type="submit" class="btn sport-btn-primary px-4 py-2 fs-6 fw-bold text-white" style="background-color: #FF6B35; border: 2px solid #111827; box-shadow: 2.5px 2.5px 0 #111827;">
              <i class="bi bi-check2-circle me-1"></i> Update Data Member
            </button>
          </div>

        </form>

        <!-- Form Terpisah Hapus Member -->
       @if(Auth::user()->role === 'admin')
         <form action="{{ route('pelanggan.destroy', $data->id ?? $data['id']) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus member ini?');" class="mt-3">
             @csrf
             @method('DELETE')
               <button type="submit" class="btn btn-danger px-4 py-2 fw-bold" style="border: 2px solid #111827; box-shadow: 2.5px 2.5px 0 #111827;">
                     <i class="bi bi-trash-fill me-1"></i> Hapus Member
               </button>
         </form>
       @endif

      </div>
    </div>

  </div>

</div>
@endsection
