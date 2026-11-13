<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Pelanggan;

class PelangganSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $dataPelanggan = [
                    [
                        'id'       => 'MBR-GLD-001',
                        'nama'     => 'Budi Santoso',
                        'kategoti' => 'Gold',
                        'kontak'   => '081234567801',
                    ],
                    [
                        'id'       => 'MBR-GLD-002',
                        'nama'     => 'Siti Aminah',
                        'kategoti' => 'Gold',
                        'kontak'   => '081234567802',
                    ],
                    [
                        'id'       => 'MBR-GLD-003',
                        'nama'     => 'Andi Wijaya',
                        'kategoti' => 'Gold',
                        'kontak'   => '081234567803',
                    ],
                    [
                        'id'       => 'MBR-SLR-001',
                        'nama'     => 'Rina Marlina',
                        'kategoti' => 'Silver',
                        'kontak'   => '081234567804',
                    ],
                    [
                        'id'       => 'MBR-SLR-002',
                        'nama'     => 'Dimas Anggara',
                        'kategoti' => 'Silver',
                        'kontak'   => '081234567805',
                    ],
                    [
                        'id'       => 'MBR-SLR-003',
                        'nama'     => 'Nadia Kusuma',
                        'kategoti' => 'Silver',
                        'kontak'   => '081234567806',
                    ],
                    [
                        'id'       => 'MBR-SLR-004',
                        'nama'     => 'Fajar Nugroho',
                        'kategoti' => 'Silver',
                        'kontak'   => '081234567807',
                    ],
                    [
                        'id'       => 'MBR-BRZ-001',
                        'nama'     => 'Dewi Lestari',
                        'kategoti' => 'Bronze',
                        'kontak'   => '081234567808',
                    ],
                    [
                        'id'       => 'MBR-BRZ-002',
                        'nama'     => 'Reza Gunawan',
                        'kategoti' => 'Bronze',
                        'kontak'   => '081234567809',
                    ],
                    [
                        'id'       => 'MBR-BRZ-003',
                        'nama'     => 'Tari Puspitasari',
                        'kategoti' => 'Bronze',
                        'kontak'   => '081234567810',
                    ],
                ];

                foreach ($dataPelanggan as $pelanggan) {
                    Pelanggan::updateOrCreate(
                        ['id' => $pelanggan['id']],
                        $pelanggan
                    );
                }
    }
}
