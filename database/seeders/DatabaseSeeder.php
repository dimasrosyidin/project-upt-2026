<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\ProfilUpt;
use App\Models\Pegawai;
use App\Models\ProgramKegiatan;
use App\Models\Kalkulator;
use App\Models\Berita;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        // Admin user
        User::firstOrCreate(['email' => 'admin@admin.com'], [
            'name'               => 'Admin',
            'password'           => bcrypt('admin1234'),
            'email_verified_at'  => now(),
        ]);

        // Profil UPT (hanya 1 baris)
        ProfilUpt::firstOrCreate(['id' => 1], [
            'foto_struktur' => null,
            'tugas_fungsi'  => "UPT Balai Latihan Pengembangan Produktivitas Tenaga Kerja (BLP2TK) Surabaya mempunyai tugas melaksanakan sebagian tugas Dinas di bidang latihan pengembangan produktivitas tenaga kerja.\n\nFungsi:\n1. Penyusunan rencana program dan anggaran bidang latihan pengembangan produktivitas tenaga kerja.\n2. Pelaksanaan pelatihan berbasis kompetensi bagi tenaga kerja.\n3. Pelaksanaan pengembangan dan peningkatan produktivitas tenaga kerja.\n4. Pembinaan dan konsultasi produktivitas kepada perusahaan.\n5. Pelaksanaan evaluasi dan pelaporan kegiatan latihan produktivitas.\n6. Pelaksanaan urusan ketatausahaan UPT.",
            'visi'          => "Menjadi pusat unggulan pelatihan dan pengembangan produktivitas tenaga kerja yang profesional, kompeten, dan berdaya saing di tingkat nasional.",
            'misi'          => "1. Menyelenggarakan pelatihan berbasis kompetensi yang berkualitas dan relevan dengan kebutuhan industri.\n2. Mengembangkan program peningkatan produktivitas yang inovatif dan berkelanjutan.\n3. Membangun kemitraan strategis dengan dunia usaha, industri, dan lembaga pendidikan.\n4. Meningkatkan kompetensi instruktur dan tenaga kependidikan secara berkelanjutan.\n5. Menyediakan sarana dan prasarana pelatihan yang modern dan memadai.",
        ]);

        // Pegawai dummy
        $pegawai = [
            ['nama' => 'Drs. H. Budi Santoso, M.M.',      'jabatan' => 'Kepala UPT BLP2TK Surabaya',        'urutan' => 1],
            ['nama' => 'Ir. Sri Wahyuni, M.T.',             'jabatan' => 'Kepala Sub Bagian Tata Usaha',       'urutan' => 2],
            ['nama' => 'Agus Prasetyo, S.Pd.',              'jabatan' => 'Koordinator Pelatihan',              'urutan' => 3],
            ['nama' => 'Dewi Rahmawati, S.E.',              'jabatan' => 'Staf Administrasi Keuangan',        'urutan' => 4],
            ['nama' => 'Eko Widodo, S.T.',                  'jabatan' => 'Instruktur Teknologi Informasi',    'urutan' => 5],
            ['nama' => 'Lina Kusumawati, S.Pd.',            'jabatan' => 'Instruktur Manajemen SDM',          'urutan' => 6],
        ];
        foreach ($pegawai as $p) {
            Pegawai::firstOrCreate(['nama' => $p['nama']], array_merge($p, ['foto' => null]));
        }

        // Program Kegiatan dummy
        $program = [
            [
                'nama_kegiatan' => 'Pelatihan Teknologi Informasi',
                'narasi'        => 'Program pelatihan komputer dan teknologi informasi untuk meningkatkan kompetensi digital tenaga kerja. Meliputi Microsoft Office, desain grafis, pemrograman dasar, dan keamanan siber.',
                'foto'          => null,
            ],
            [
                'nama_kegiatan' => 'Pelatihan Manajemen Produksi',
                'narasi'        => 'Pelatihan pengelolaan proses produksi yang efisien dan efektif menggunakan metode Lean Manufacturing dan Total Quality Management (TQM) untuk meningkatkan produktivitas perusahaan.',
                'foto'          => null,
            ],
            [
                'nama_kegiatan' => 'Konsultasi Produktivitas Perusahaan',
                'narasi'        => 'Layanan konsultasi langsung ke perusahaan untuk mengidentifikasi hambatan produktivitas dan memberikan solusi berbasis data. Tersedia untuk UKM maupun perusahaan besar.',
                'foto'          => null,
            ],
            [
                'nama_kegiatan' => 'Pelatihan Kewirausahaan',
                'narasi'        => 'Program pembinaan wirausaha bagi calon pengusaha muda dan tenaga kerja yang ingin mandiri secara ekonomi. Mencakup perencanaan bisnis, pemasaran digital, dan manajemen keuangan usaha.',
                'foto'          => null,
            ],
        ];
        foreach ($program as $pr) {
            ProgramKegiatan::firstOrCreate(['nama_kegiatan' => $pr['nama_kegiatan']], $pr);
        }

        // Kalkulator dummy
        $kalkulator = [
            [
                'nama_pt'       => 'PT Maju Bersama Surabaya',
                'alamat_pt'     => 'Jl. Raya Darmo No.45, Surabaya',
                'tenaga_kerja'  => 50,
                'omzet_1'  => 120000000, 'omzet_2'  => 135000000, 'omzet_3'  => 110000000,
                'omzet_4'  => 145000000, 'omzet_5'  => 160000000, 'omzet_6'  => 175000000,
                'omzet_7'  => 155000000, 'omzet_8'  => 140000000, 'omzet_9'  => 165000000,
                'omzet_10' => 180000000, 'omzet_11' => 190000000, 'omzet_12' => 210000000,
            ],
            [
                'nama_pt'       => 'CV Karya Produktif Jaya',
                'alamat_pt'     => 'Jl. Wonokromo No.12, Surabaya',
                'tenaga_kerja'  => 25,
                'omzet_1'  => 55000000,  'omzet_2'  => 60000000,  'omzet_3'  => 58000000,
                'omzet_4'  => 65000000,  'omzet_5'  => 70000000,  'omzet_6'  => 72000000,
                'omzet_7'  => 68000000,  'omzet_8'  => 75000000,  'omzet_9'  => 80000000,
                'omzet_10' => 77000000,  'omzet_11' => 85000000,  'omzet_12' => 90000000,
            ],
        ];
        foreach ($kalkulator as $k) {
            Kalkulator::firstOrCreate(['nama_pt' => $k['nama_pt']], $k);
        }

        // Berita dummy — hapus semua dulu agar bisa insert ulang dengan created_at berbeda
        \App\Models\Berita::truncate();

        $berita = [
            [
                'judul'      => 'Pembukaan Pelatihan Peningkatan Produktivitas Batch I Tahun 2026',
                'narasi'     => 'UPT Balai Latihan Pengembangan Produktivitas Tenaga Kerja (BLP2TK) Surabaya secara resmi membuka Program Pelatihan Peningkatan Produktivitas Batch I Tahun 2026 pada Senin, 23 Februari 2026. Kegiatan yang berlangsung selama 5 hari kerja ini diikuti oleh 65 peserta dari berbagai perusahaan manufaktur dan jasa di wilayah Surabaya, Sidoarjo, dan Gresik. Kepala UPT BLP2TK Surabaya, Drs. H. Budi Santoso, M.M., dalam sambutannya menekankan pentingnya peningkatan produktivitas tenaga kerja sebagai kunci daya saing bangsa di era global. "Kami berharap seluruh peserta dapat mengaplikasikan ilmu yang diperoleh langsung di tempat kerja masing-masing," ujarnya. Program pelatihan mencakup materi Pengukuran Produktivitas, Teknik Efisiensi Kerja, 5S/Kaizen, serta Manajemen Waktu Berbasis Lean.',
                'foto'       => null,
                'created_at' => '2026-02-23 08:00:00',
                'updated_at' => '2026-02-23 08:00:00',
            ],
            [
                'judul'      => 'UPT BLP2TK Surabaya Tandatangani MoU dengan 12 Perusahaan untuk Penempatan Tenaga Kerja Terlatih',
                'narasi'     => 'Sebagai wujud nyata sinergi antara lembaga pelatihan dan dunia industri, UPT BLP2TK Surabaya menandatangani Nota Kesepahaman (MoU) dengan 12 perusahaan dari sektor manufaktur, perdagangan, dan jasa di Kota Surabaya pada Selasa, 18 Februari 2026. Penandatanganan MoU ini bertujuan untuk membuka jalur penempatan kerja bagi alumni pelatihan BLP2TK secara langsung ke mitra industri. Kepala Dinas Tenaga Kerja Kota Surabaya yang turut hadir menyampaikan apresiasi atas inisiatif ini dan mendorong lebih banyak perusahaan untuk bermitra. Ke-12 perusahaan yang bergabung mencakup bidang elektronik, tekstil, logistik, serta kuliner industri. Program ini diharapkan mampu mengurangi tingkat pengangguran terbuka di Surabaya secara signifikan.',
                'foto'       => null,
                'created_at' => '2026-02-18 09:30:00',
                'updated_at' => '2026-02-18 09:30:00',
            ],
            [
                'judul'      => 'Bimtek Konsultasi Produktivitas Gratis untuk UKM Surabaya Dibuka Bulan Februari 2026',
                'narasi'     => 'Dalam rangka mendukung pertumbuhan Usaha Kecil dan Menengah (UKM) di Kota Surabaya, UPT BLP2TK Surabaya membuka program Bimbingan Teknis (Bimtek) Konsultasi Produktivitas secara gratis selama bulan Februari 2026. Program ini menyasar pelaku UKM yang ingin meningkatkan efisiensi operasional, mengurangi pemborosan produksi, dan memperbaiki kualitas layanan. Konsultasi dilakukan langsung oleh tim konsultan produktivitas bersertifikat yang akan mengunjungi tempat usaha peserta. Pendaftaran dapat dilakukan secara online melalui website resmi atau datang langsung ke kantor UPT BLP2TK Surabaya di Jalan Dukuh Menanggal No. 124-126. Kuota terbatas hanya untuk 30 UKM pertama yang mendaftar.',
                'foto'       => null,
                'created_at' => '2026-02-10 10:00:00',
                'updated_at' => '2026-02-10 10:00:00',
            ],
            [
                'judul'      => 'Rakor Evaluasi Kinerja Program Pelatihan Semester II Tahun 2025 Hasilkan Rekomendasi Strategis',
                'narasi'     => 'UPT BLP2TK Surabaya menggelar Rapat Koordinasi (Rakor) Evaluasi Kinerja Program Pelatihan Semester II Tahun 2025 pada Kamis, 29 Januari 2026. Rakor yang dihadiri oleh seluruh instruktur, koordinator program, dan pejabat struktural ini membahas capaian dan hambatan pelaksanaan program pelatihan sepanjang Juli–Desember 2025. Berdasarkan data yang dipaparkan, total peserta pelatihan pada semester II 2025 mencapai 480 orang dengan tingkat penyerapan tenaga kerja pasca-pelatihan sebesar 78%. Rakor menghasilkan sejumlah rekomendasi strategis, di antaranya penambahan kuota pelatihan berbasis digital, peningkatan kualitas sarana praktik, serta pengembangan kurikulum baru yang selaras dengan kebutuhan industri 4.0.',
                'foto'       => null,
                'created_at' => '2026-01-29 14:00:00',
                'updated_at' => '2026-01-29 14:00:00',
            ],
            [
                'judul'      => 'UPT BLP2TK Surabaya Raih Penghargaan Lembaga Pelatihan Kerja Terbaik Jawa Timur 2025',
                'narasi'     => 'Prestasi membanggakan diraih oleh UPT Balai Latihan Pengembangan Produktivitas Tenaga Kerja (BLP2TK) Surabaya pada penghujung tahun 2025. Lembaga di bawah naungan Dinas Tenaga Kerja Kota Surabaya ini berhasil meraih penghargaan sebagai Lembaga Pelatihan Kerja (LPK) Terbaik tingkat Provinsi Jawa Timur dari Kementerian Ketenagakerjaan Republik Indonesia. Penghargaan diserahkan langsung oleh Gubernur Jawa Timur dalam acara Apresiasi LPK Jawa Timur 2025 yang digelar di Surabaya pada 15 Desember 2025. Penilaian meliputi aspek kualitas kurikulum, kelengkapan fasilitas, kompetensi instruktur, tingkat kelulusan peserta, dan dampak nyata terhadap penyerapan tenaga kerja. "Penghargaan ini adalah milik seluruh tim dan peserta pelatihan yang telah berjuang keras," ujar Kepala UPT.',
                'foto'       => null,
                'created_at' => '2025-12-15 16:00:00',
                'updated_at' => '2025-12-15 16:00:00',
            ],
        ];
        foreach ($berita as $b) {
            Berita::create($b);
        }
    }
}
