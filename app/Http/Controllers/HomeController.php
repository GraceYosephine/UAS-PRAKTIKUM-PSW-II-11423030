<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Midtrans\Snap;

class HomeController extends Controller
{
    public function index()
    {
        $lapangan = DB::table('lapangan')->Join('pengelola', 'lapangan.idpengelola', '=', 'pengelola.idpengelola')->orderBy('idlapangan', 'desc')->limit(3)->get();
        $data = [
            'lapangan' => $lapangan,
        ];

        return view('home/index', $data);
    }

    public function lapangan()
    {
        return view('home/lapangan');
    }

    public function detail($id)
    {
        $lapangan = DB::table('lapangan')->where('idlapangan', $id)->first();
        $data = [
            'lapangan' => $lapangan,
        ];
        return view('home.detail', $data);
    }

    public function login()
    {
        return view('home.login');
    }

    public function dologin(Request $request)
    {
        $email = $request->input('email');
        $password = $request->input('password');
        $akun = DB::table('pengguna')
            ->where('email', $email)
            ->where('password', $password)
            ->first();

        if ($akun) {
            if ($akun->level == "Pelanggan") {
                session(['pengguna' => $akun]);
                return redirect('home')->with('alert', 'Anda sukses login');
            } elseif ($akun->level == "Admin") {
                session(['admin' => $akun]);
                return redirect('admin')->with('alert', 'Anda sukses login');
            }
        } else {
            return redirect()->back()->with('alert', 'Anda gagal login, Cek akun anda');
        }
    }


    public function akun()
    {
        if (!session('pengguna')) {
            session()->flash('alert', 'Anda belum login. Silakan login terlebih dahulu.');
            return redirect('home/login');
        }

        $idpengguna = session('pengguna')->id;
        $pengguna = DB::table('pengguna')->where('id', $idpengguna)->first();

        $data = [
            'pengguna' => $pengguna,
        ];
        return view('home.akun', $data);
    }

    public function ubahakun(Request $request, $id)
    {
        $password = $request->input('password');
        if (empty($password)) {
            $password = $request->input('passwordlama');
        }
        DB::table('pengguna')
            ->where('id', $id)
            ->update([
                'password' => $password,
                'nama' => $request->input('nama'),
                'email' => $request->input('email'),
                'nohp' => $request->input('nohp'),
                'alamat' => $request->input('alamat'),
            ]);

        return redirect('home/akun');
    }

    public function daftar()
    {
        return view('home.daftar');
    }

    public function dodaftar(Request $request)
    {
        $nama = $request->input('nama');
        $email = $request->input('email');
        $password = $request->input('password');
        $alamat = $request->input('alamat');
        $nohp = $request->input('nohp');
        $existingUser = DB::table('pengguna')->where('email', $email)->count();

        if ($existingUser == 1) {
            return redirect()->back()->with('alert', 'Pendaftaran Gagal, email sudah ada');
        } else {
            DB::table('pengguna')->insert([
                'nama' => $nama,
                'email' => $email,
                'password' => $password,
                'alamat' => $alamat,
                'nohp' => $nohp,
                'level' => 'Pelanggan'
            ]);

            return redirect('home/login')->with('alert', 'Pendaftaran Berhasil');
        }
    }

    public function logout()
    {
        session()->flush();
        return redirect('home')->with('alert', 'Anda Telah Logout');
    }

    public function pesan(Request $request)
    {
        session()->forget('keranjang');
        $idlapangan = $request->input('idlapangan');
        $jumlah = $request->input('jumlah');
        $keranjang = session()->get('keranjang');

        if ($keranjang === null) {
            // Jika keranjang tidak ada dalam sesi, inisialisasi sebagai array kosong
            $keranjang = [];
        }

        if (isset($keranjang[$idlapangan])) {
            $keranjang[$idlapangan] += $jumlah;
        } else {
            $keranjang[$idlapangan] = $jumlah;
        }

        session(['keranjang' => $keranjang]);
        session()->flash('alert', 'Silahkan isi biodata anda');
        return redirect('home/checkout');
    }

    public function keranjang()
    {
        if (empty(session('keranjang'))) {
            session()->flash('alert', 'Keranjang kosong');
            return redirect('home/lapangan'); // Ganti dengan URL halaman login Anda 
        }
        $keranjang = session()->get('keranjang');
        $data = [
            'keranjang' => $keranjang,
        ];

        return view('home.keranjang', $data);
    }

    public function updateKeranjang(Request $request)
    {
        $idlapangan = $request->input('idlapangan');
        $jumlah = $request->input('jumlah');

        // Perform operations here

        // Calculate the new total harga (example calculation)
        $data = DB::table('lapangan')->where('idlapangan', $idlapangan)->first();
        $totalharga = $data->hargalapangan * $jumlah;

        // Return the new total harga as a response
        $response = [
            'totalharga' => 'Rp ' . number_format($totalharga, 2, ',', '.'),
            'tulisan' => 'Jumlah Pesanan : ' . $jumlah . ' x Rp ' . number_format($data->hargalapangan, 2, ',', '.')
        ];

        return response()->json($response);
    }

    public function hapuskeranjang(Request $request)
    {
        $idlapangan = $request->input('idlapangan');
        $keranjang = session()->get('keranjang'); // Ambil keranjang dari sesi

        if (isset($keranjang[$idlapangan])) {
            unset($keranjang[$idlapangan]); // Hapus item keranjang berdasarkan ID lapangan
            session(['keranjang' => $keranjang]); // Simpan kembali keranjang yang telah dihapus ke sesi
        }
        $response = [
            'idlapangan' => $idlapangan
        ];

        return response()->json($response);
    }

    public function checkout()
    {
        if (!session('pengguna')) {
            session()->flash('alert', 'Anda belum login. Silakan login terlebih dahulu.');
            return redirect('home/login');
        }
        $keranjang = session()->get('keranjang'); // Ambil keranjang dari sesi'
        $data['keranjang'] = $keranjang;
        $jambooking = DB::table('jambooking')->orderBy('idjambooking', 'asc')->get();
        $data['jambooking'] = $jambooking;
        return view('home.checkout', $data);
    }

    public function docheckout(Request $request)
    {
        if (!session('pengguna')) {
            session()->flash('alert', 'Anda belum login. Silakan login terlebih dahulu.');
            return redirect('home/login');
        }
        $notransaksi = 'TP' . date("Ymdhis");
        $tanggalbooking = date("Y-m-d");
        $waktu = date("Y-m-d H:i:s");
        $grandtotal = $request->input('grandtotal');
        $nama = $request->input('nama');
        $nohp = $request->input('nohp');
        $jambooking = $request->input('jambooking');
        $idpengguna = session('pengguna')->id;
        DB::table('booking')->insert([
            'id' => $idpengguna,
            'notransaksi' => $notransaksi,
            'tanggalbooking' => $tanggalbooking,
            'totalbooking' => $grandtotal,
            'nama' => $nama,
            'nohp' => $nohp,
            'jambooking' => $jambooking,
            'statusbooking' => 'Belum di Konfirmasi',
            'waktu' => $waktu,
        ]);

        $keranjang = session()->get('keranjang');
        $idbooking = DB::getPdo()->lastInsertId();
        $no = 1;
        $items = [];
        foreach ($keranjang as $idlapangan => $jumlah) {
            $lapangan = DB::table('lapangan')->where('idlapangan', $idlapangan)->first();
            $item = [
                'id' => $lapangan->idlapangan,
                'price' => $lapangan->hargalapangan,
                'quantity' => $jumlah,
                'name' => $lapangan->namalapangan,
            ];
            $items[] = $item;

            $idlapangan = $lapangan->idlapangan;
            $nama = $lapangan->namalapangan;
            $harga = $lapangan->hargalapangan;

            $subharga = $lapangan->hargalapangan * $jumlah;

            DB::table('bookingdetail')->insert([
                'idbooking' => $idbooking,
                'idlapangan' => $idlapangan,
                'nama' => $nama,
                'harga' => $harga,
                'subharga' => $subharga,
                'jumlah' => $jumlah,
            ]);
            $no++;
        }
        $jambookingselesai = $jambooking + $no;
        $simpanupdate = [
            'jambooking' => $jambooking . '.00 - ' . $jambookingselesai . '.00',
        ];
        DB::table('booking')->where('idbooking', $idbooking)->update($simpanupdate);

        session()->forget('keranjang');

        session()->flash('alert', 'Berhasil Checkout');
        return redirect('home/riwayat');
    }

    public function riwayat()
    {
        $idpengguna = session('pengguna')->id;
        $databooking = DB::table('booking')
            ->select('*', 'booking.idbooking as idbookingreal')
            ->where('booking.id', $idpengguna)
            ->orderBy('booking.tanggalbooking', 'desc')
            ->orderBy('booking.idbooking', 'desc')
            ->get();

        $datalapangan = [];
        foreach ($databooking as $row) {
            $idbooking = $row->idbookingreal;
            $lapangan = DB::table('bookingdetail')
                ->join('lapangan', 'bookingdetail.idlapangan', '=', 'lapangan.idlapangan')
                ->where('idbooking', $idbooking)
                ->get();
            $datalapangan[$idbooking] = $lapangan;
        }

        $data = [
            'databooking' => $databooking,
            'datalapangan' => $datalapangan,
        ];

        return view('home.riwayat', $data);
    }

    public function transaksidetail($id)
    {
        $databooking = DB::table('booking')
            ->where('booking.idbooking', $id)->first();
        $datalapangan = DB::table('bookingdetail')
            ->join('lapangan', 'bookingdetail.idlapangan', '=', 'lapangan.idlapangan')
            ->where('idbooking', $id)
            ->get();

        $data = [
            'id' => $id,
            'databooking' => $databooking,
            'datalapangan' => $datalapangan,
        ];

        return view('home.transaksidetail', $data);
    }
    public function notacetak($id)
    {
        $databooking = DB::table('booking')
            ->where('booking.idbooking', $id)->first();
        $datalapangan = DB::table('bookingdetail')
            ->join('lapangan', 'bookingdetail.idlapangan', '=', 'lapangan.idlapangan')
            ->where('idbooking', $id)
            ->get();

        $data = [
            'id' => $id,
            'databooking' => $databooking,
            'datalapangan' => $datalapangan,
        ];

        return view('home.notacetak', $data);
    }

    public function pembayaransimpan(Request $request)
    {
        $namabukti = $request->file('bukti')->getClientOriginalName();
        $namafix = date("YmdHis") . $namabukti;
        $request->file('bukti')->move('foto', $namafix);

        $idbooking = $request->input('idbooking');
        $nama = $request->input('nama');
        $tanggaltransfer = $request->input('tanggaltransfer');
        $tanggal = date("Y-m-d");

        DB::table('pembayaran')->insert([
            'idbooking' => $idbooking,
            'nama' => $nama,
            'tanggaltransfer' => $tanggaltransfer,
            'tanggal' => $tanggal,
            'bukti' => $namafix,
        ]);

        DB::table('booking')->where('idbooking', $idbooking)->update([
            'statusbooking' => 'Sudah Upload Bukti Pembayaran',
        ]);

        return redirect('home/riwayat')->with('alert', 'Terima kasih');
    }

    public function selesai(Request $request)
    {
        $idbooking = $request->input('idbooking');
        DB::table('booking')->where('idbooking', $idbooking)->update([
            'statusbooking' => 'Selesai'
        ]);
        return redirect('home/riwayat');
    }
}
