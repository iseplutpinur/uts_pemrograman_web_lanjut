<?php

namespace App\Http\Livewire;

use App\Exports\MahasiswaExport;
use App\Models\Mahasiswa;
use App\Models\Jurusan;
use Livewire\Component;
use Livewire\WithPagination;
use Maatwebsite\Excel\Facades\Excel;

// mengunakan aliases supaya mudah di fahami
use Barryvdh\DomPDF\Facade as PDF;

class MahasiswaForm extends Component
{
    use WithPagination;
    public $npm;
    public $nama;
    public $alamat;
    public $jurusan_id;
    public $search;
    public $postId;
    public $isOpen = 0;

    protected $rules = [
        'npm' => 'required',
        'nama' => 'required',
        'jurusan_id' => 'required',
        'alamat' => 'required',
    ];

    public function index()
    {
        return view('mahasiswa');
    }

    public function showModal()
    {
        $this->jurusan_id = (in_array($this->jurusan_id, [null, ''])) ? Jurusan::first()->id : $this->jurusan_id;
        $this->isOpen = true;
    }

    public function hideModal()
    {
        $this->isOpen = false;
    }

    public function store()
    {
        $this->validate(
            [
                'npm' => 'required',
                'nama' => 'required',
                'jurusan_id' => 'required',
                'alamat' => 'required',
            ]
        );

        Mahasiswa::updateOrCreate(['id' => $this->postId], [
            'npm' => $this->npm,
            'nama' => $this->nama,
            'jurusan_id' => $this->jurusan_id,
            'alamat' => $this->alamat,
        ]);

        $this->hideModal();

        session()->flash('info', $this->postId ? 'Mahasiswa Update Successfully' : 'Mahasiswa Created Successfully');
        $this->postId = '';
        $this->npm = '';
        $this->nama = '';
        $this->jurusan_id = Jurusan::first();
        $this->alamat = '';
    }

    public function edit($id)
    {
        $post = Mahasiswa::find($id);
        $this->postId = $post->id;
        $this->npm = $post->npm;
        $this->nama = $post->nama;
        $this->jurusan_id = $post->jurusan_id;
        $this->alamat = $post->alamat;
        $this->showModal();
    }

    public function update()
    {
        $post = Mahasiswa::updateOrCreate(
            [
                'id'   => $this->post_id,
            ],
            [
                'npm' => $this->npm,
                'nama' => $this->nama,
                'jurusan_id' => $this->jurusan_id,
                'alamat' => $this->alamat,
            ],

        );
        $this->reset();
    }

    public function destroy($id)
    {
        Mahasiswa::destroy($id);
    }

    public function render()
    {
        $jurusans = Jurusan::all();
        $searchParams = '%' . $this->search . '%';
        return view('livewire.mahasiswa-form', [
            'mahasiswas' => Mahasiswa::with(['jurusan'])
                ->where('nama', 'like', $searchParams)->latest()->paginate(5),
            'jurusans' => $jurusans
        ]);
    }

    public function exportExcel()
    {
        return Excel::download(new MahasiswaExport, 'mahasiswa.xlsx');
    }

    public function exportPDF()
    {
        $mahasiswas = Mahasiswa::with(['jurusan'])->get();
        $pdf = PDF::loadView('export.post', ['mahasiswas' => $mahasiswas]);
        return $pdf->download('mahasiswa.pdf');
    }
}
