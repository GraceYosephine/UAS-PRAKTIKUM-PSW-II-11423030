<?php

namespace App\Http\Controllers;

use App\Models\PengelolaModel;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function index()
    {
        $data['jumlahlapangan'] = DB::table('lapangan')->count();
        $data['jumlahorder'] = DB::table('booking')->where('tanggalbooking', date('Y-m-d'))->count();
        return view('admin.dashboard', $data);
    }

    public function pengelola()
    {
        $data['pengelola'] = DB::table('pengelola')->get();
        return view('admin.pengelola', $data);
    }

    public function tambahpengelola()
    {

        return view('admin.tambahpengelola');
    }

    public function simpanpengelola(Request $request)
    {
        $data = [
            'namapengelola' => $request->pengelola,
            'idpengelola' => $request->pengelola,
        ];
        PengelolaModel::create($data);
        session()->flash('alert', 'Berhasil menambahkan data!');
        return redirect('admin/pengelola');
    }

    public function ubahpengelola($id)
    {
        $data['pengelola'] = PengelolaModel::where('idpengelola', $id)->first();
        return view('admin.ubahpengelola', $data);
    }

    public function updatepengelola(Request $request, $id)
    {
        $data = [
            'namapengelola' => $request->pengelola
        ];
        PengelolaModel::where('idpengelola', $id)->update($data);
        session()->flash('alert', 'Berhasil mengubah data!');
        return redirect('admin/pengelola');
    }

    public function hapuspengelola($id)
    {
        PengelolaModel::where('idpengelola', $id)->delete();
        session()->flash('alert', 'Berhasil menghapus data!');
        return redirect('admin/pengelola');
    }

    public function lapangan()
    {
        $lapangan = DB::table('lapangan')->Join('pengelola', 'lapangan.idpengelola', '=', 'pengelola.idpengelola')->get();
        $data['lapangan'] = $lapangan;
        return view('admin.lapangan', $data);
    }

    public function tambahlapangan()
    {
        $data['pengelola'] = DB::table('pengelola')->get();
        return view('admin.tambahlapangan', $data);
    }

    public function simpanlapangan(Request $request)
    {
        $namafoto = $request->file('foto')->getClientOriginalName();
        $request->file('foto')->move(public_path('foto'), $namafoto);

        DB::table('lapangan')->insert([
            'namalapangan' => $request->input('nama'),
            'idpengelola' => $request->input('idpengelola'),
            'hargalapangan' => $request->input('harga'),
            'fotolapangan' => $namafoto,
            'deskripsilapangan' => $request->input('deskripsi'),
        ]);
        session()->flash('alert', 'Berhasil menambah data!');

        return redirect('admin/lapangan');
    }

    public function ubahlapangan($id)
    {
        $data['lapangan'] = DB::table('lapangan')->where('idlapangan', $id)->first();
        $data['pengelola'] = DB::table('pengelola')->get();
        return view('admin.ubahlapangan', $data);
    }

    public function updatelapangan(Request $request, $id)
    {
        $data = [
            'namalapangan' => $request->input('nama'),
            'idpengelola' => $request->input('idpengelola'),
            'hargalapangan' => $request->input('harga'),
            'deskripsilapangan' => $request->input('deskripsi'),
        ];
        $lapangan = DB::table('lapangan')->where('idlapangan', $id)->first();
        $fotoPath = public_path('foto/' . $lapangan->fotolapangan);
        if ($request->hasFile('foto')) {
            $namafoto = $request->file('foto')->getClientOriginalName();
            $request->file('foto')->move(public_path('foto'), $namafoto);
            $data['fotolapangan'] = $namafoto;
        }
        DB::table('lapangan')->where('idlapangan', $id)->update($data);
        session()->flash('alert', 'Berhasil mengubah data!');
        return redirect('admin/lapangan');
    }

    public function hapuslapangan($id)
    {
        DB::table('lapangan')->where('idlapangan', $id)->delete();
        session()->flash('alert', 'Berhasil menghapus data!');
        return redirect('admin/lapangan');
    }

    public function pengguna()
    {
        $pengguna = DB::table('pengguna')->get();

        $data = [
            'pengguna' => $pengguna,
        ];

        return view('admin.pengguna', $data);
    }

    public function logout()
    {
        session()->flush();
        return redirect('home')->with('alert', 'Anda Telah Logout');
    }

    public function booking()
    {
        $booking = DB::table('booking')
            ->orderBy('booking.tanggalbooking', 'desc')->orderBy('booking.idbooking', 'desc')->get();
        $datalapangan = [];
        foreach ($booking as $row) {
            $idbooking = $row->idbooking;
            $lapangan = DB::table('bookingdetail')
                ->join('lapangan', 'bookingdetail.idlapangan', '=', 'lapangan.idlapangan')
                ->where('idbooking', $idbooking)
                ->get();
            $datalapangan[$idbooking] = $lapangan;
        }
        $data = [
            'booking' => $booking,
            'datalapangan' => $datalapangan,
        ];
        return view('admin.booking', $data);
    }

    public function laporan()
    {
        $booking = DB::table('booking')
            ->where('tanggalbooking', '>=', \Carbon\Carbon::now()->subDays(7))
            ->where(function ($query) {
                $query->where('statusbooking', 'Booking Di Terima')
                    ->orWhere('statusbooking', 'Selesai');
            })
            ->orderBy('tanggalbooking', 'desc')
            ->orderBy('idbooking', 'desc')
            ->get();

        $datalapangan = [];
        foreach ($booking as $row) {
            $idbooking = $row->idbooking;
            $lapangan = DB::table('bookingdetail')
                ->join('lapangan', 'bookingdetail.idlapangan', '=', 'lapangan.idlapangan')
                ->where('idbooking', $idbooking)
                ->get();
            $datalapangan[$idbooking] = $lapangan;
        }
        $data = [
            'booking' => $booking,
            'datalapangan' => $datalapangan,
        ];
        return view('admin.laporan', $data);
    }


    public function pembayaran($id)
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

        return view('admin.pembayaran', $data);
    }

    public function simpanpembayaran($id, Request $request)
    {
        if ($request->has('proses')) {
            $catatan = $request->input('catatan');
            $statusbooking = $request->input('statusbooking');
            DB::table('booking')->where('idbooking', $id)->update([
                'catatan' => $catatan,
                'statusbooking' => $statusbooking,
            ]);
            return redirect('admin/booking');
        }
    }

    public function pembayaranhapus($id)
    {
        DB::table('booking')->where('idbooking', $id)->delete();
        DB::table('bookingdetail')->where('idbooking', $id)->delete();
        session()->flash('alert', 'Berhasil menghapus data!');
        return redirect('admin/booking');
    }
}
