<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\StokDarah;
use App\Models\JadwalDonor;
use App\Models\RiwayatDonor;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Administrator',
            'email' => 'admin@donordarah.com',
            'password' => Hash::make('admin123'),
            'role' => 'admin',
            'golongan_darah' => 'O+',
            'tanggal_lahir' => '1990-01-01',
            'alamat' => 'Jakarta Pusat',
            'telepon' => '081234567890',
        ]);

        $pendonor1 = User::create([
            'name' => 'Ahmad Susanto',
            'email' => 'ahmad@example.com',
            'password' => Hash::make('password'),
            'role' => 'pendonor',
            'golongan_darah' => 'A+',
            'tanggal_lahir' => '1995-05-15',
            'alamat' => 'Jakarta Selatan',
            'telepon' => '081234567891',
        ]);

        $pendonor2 = User::create([
            'name' => 'Dewi Lestari',
            'email' => 'dewi@example.com',
            'password' => Hash::make('password'),
            'role' => 'pendonor',
            'golongan_darah' => 'B+',
            'tanggal_lahir' => '1992-08-20',
            'alamat' => 'Depok',
            'telepon' => '081234567892',
        ]);

        $pendonor3 = User::create([
            'name' => 'Budi Raharjo',
            'email' => 'budi@example.com',
            'password' => Hash::make('password'),
            'role' => 'pendonor',
            'golongan_darah' => 'O+',
            'tanggal_lahir' => '1988-03-10',
            'alamat' => 'Tangerang',
            'telepon' => '081234567893',
        ]);

        $bloodTypes = ['A+', 'A-', 'B+', 'B-', 'AB+', 'AB-', 'O+', 'O-'];
        $amounts = [42, 15, 38, 12, 25, 8, 51, 10];

        foreach ($bloodTypes as $index => $type) {
            StokDarah::create([
                'golongan_darah' => $type,
                'jumlah' => $amounts[$index],
            ]);
        }

        JadwalDonor::create([
            'lokasi' => 'PMI Jakarta Pusat',
            'tanggal' => now()->addDays(7),
            'jam_mulai' => '08:00:00',
            'jam_selesai' => '14:00:00',
            'keterangan' => 'Donor darah rutin bulanan',
        ]);

        JadwalDonor::create([
            'lokasi' => 'PMI Depok',
            'tanggal' => now()->addDays(14),
            'jam_mulai' => '09:00:00',
            'jam_selesai' => '15:00:00',
            'keterangan' => 'Donor darah di kampus',
        ]);

        JadwalDonor::create([
            'lokasi' => 'PMI Tangerang',
            'tanggal' => now()->addDays(21),
            'jam_mulai' => '08:00:00',
            'jam_selesai' => '13:00:00',
            'keterangan' => 'Donor darah di mall',
        ]);

        RiwayatDonor::create([
            'user_id' => $pendonor1->id,
            'tanggal' => now()->subDays(90),
            'lokasi' => 'PMI Jakarta Pusat',
            'status' => 'selesai',
            'catatan' => 'Donor berhasil, kondisi baik',
        ]);

        RiwayatDonor::create([
            'user_id' => $pendonor2->id,
            'tanggal' => now()->subDays(60),
            'lokasi' => 'PMI Depok',
            'status' => 'selesai',
            'catatan' => 'Donor berhasil',
        ]);

        RiwayatDonor::create([
            'user_id' => $pendonor3->id,
            'tanggal' => now()->addDays(7),
            'lokasi' => 'PMI Tangerang',
            'status' => 'dijadwalkan',
            'catatan' => 'Jadwal donor berikutnya',
        ]);
    }
}
