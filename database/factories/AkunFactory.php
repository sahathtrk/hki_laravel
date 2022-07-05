<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Akun>
 */
class AkunFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {

        $tipe_akun = ['Admin', 'Pucuk Pimpinan', 'Kepala Departemen Umum', 'Pimpinan Jemaat', 'Pimpinan Daerah', 'Pimpinan Ressort'];
        $golongan_darah = ['A', 'B', 'AB', 'O'];
        $gender = ['Laki-laki', 'Perempuan'];

        return [
            'nama_lengkap'  => $this->faker->name(),
            'nik'           => $this->faker->bankAccountNumber,
            'jenis_kelamin' => $gender[rand(0,1)],
            'tanggal_lahir' => $this->faker->date('Y_m_d'),  
            'tempat_lahir'  => $this->faker->city,  
            'alamat'        => $this->faker->address, 
            'nama_ibu'      => $this->faker->name, 
            'nama_ayah'     => $this->faker->name, 
            'tinggi_badan'  => rand(100,1000),
            'berat_badan'   => rand(100,1000),
            'golongan_darah'=> $golongan_darah[rand(0,3)],
            'hobby'         => $this->faker->jobTitle(), 
            'no_hp'         => $this->faker->phoneNumber(), 
            'email'         => $this->faker->email(), 
            'tipe_akun'     => $tipe_akun[rand(0,5)],
            'media_sosial'  => $this->faker->name, 
            'username'      => $this->faker->username, 
            'password'      => Hash::make('admin'), 
            'foto'          => 'akun/foto/foto-akun-404.jpg', 
            'aktivasi'      => true, 
        ];
    }
}
