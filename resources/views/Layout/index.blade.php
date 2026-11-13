@extends('Layout.app')

@section('title', 'Court 90 - Roster Pelanggan')

@section('content')
<div class="container">
  <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-3 mb-4">
    <div>
      <h1 class="h3 fw-black text-dark text-uppercase mb-1" style="letter-spacing: -0.5px;">
        Manajemen Pelanggan & Atlet Member
      </h1>
      <p class="text-dark fw-medium small mb-0 opacity-75">
        Database keanggotaan venue gelanggang olahraga
      </p>
    </div>
    <div>
      {{-- Tombol untuk menuju ke form tambah member --}}
      <a href="{{ route('pelanggan.create') }}" class="btn sport-btn-primary px-3 py-2 fw-bold">
        <i class="bi bi-plus-circle-fill me-1"></i> Tambah Member
      </a>
    </div>
  </div>

  <div class="sport-static-card overflow-hidden">
    <div class="table-responsive">
      <table class="table table-hover table-sport align-middle mb-0">
        <thead>
          <tr>
            <th scope="col" class="ps-3 py-3">Nama Atlet / Pelanggan</th>
            <th scope="col" class="py-3">No. Kartu / ID</th>
            <th scope="col" class="py-3">Kategori Tier</th>
            <th scope="col" class="py-3">Kontak Telepon</th>
            <th scope="col" class="py-3 text-end pe-3">Aksi</th>
          </tr>
        </thead>
        <tbody>
          @forelse($pelanggan as $row)
            @php
              // buat atur logika inisial nama
              $words = explode(' ', trim($row->nama));
              $initials = strtoupper(substr($words[0], 0, 1) . (isset($words[1]) ? substr($words[1], 0, 1) : ''));
            @endphp
            <tr>
              <td class="ps-3 py-3 fw-bold text-dark">
                <div class="d-flex align-items-center gap-2">
                  <span class="rounded-circle text-white fw-bold d-inline-flex align-items-center justify-content-center flex-shrink-0"
                        style="width: 36px; height: 36px; background-color: #FF6B35; border: 2px solid #111827; box-shadow: 2px 2px 0 #111827; font-size: 0.85rem;">
                    {{ $initials }}
                  </span>
                  <span>{{ $row->nama }}</span>
                </div>
              </td>
              <td>{{ $row->id }}</td>
              <td>{{ $row->kategoti }}</td>
              <td>{{ $row->kontak }}</td>
              <td class="text-end pe-3">
                {{-- Mengarahkan ke halaman edit/profil berdasarkan ID member --}}
                <a href="{{ route('pelanggan.edit', $row->id) }}" class="btn btn-sm btn-outline-dark py-1 px-2">
                  Profil
                </a>
              </td>
            </tr>
          @empty
            <tr>
              <td colspan="5" class="text-center py-4 text-muted">
                Belum ada data pelanggan di database.
              </td>
            </tr>
          @endforelse
        </tbody>
      </table>
    </div>
  </div>
</div>
@endsection
