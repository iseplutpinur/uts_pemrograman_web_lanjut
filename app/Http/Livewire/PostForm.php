<?php

namespace App\Http\Livewire;

use App\Exports\PostExport;
use App\Models\Post;
use Livewire\Component;
use Livewire\WithPagination;
use Maatwebsite\Excel\Facades\Excel;

// mengunakan aliases supaya mudah di fahami
use Barryvdh\DomPDF\Facade as PDF;

class PostForm extends Component
{
    use WithPagination;
    public $title;
    public $search;
    public $description;
    public $postId;
    public $isOpen = 0;

    protected $rules = [
        'title' => 'required',
        'description' => 'required',
    ];

    public function showModal()
    {
        $this->isOpen = true;
    }

    public function hideModal()
    {
        $this->isOpen = false;
    }

    public function index()
    {
        return view('posts');
    }

    public function store()
    {
        $this->validate(
            [
                'title' => 'required',
                'description' => 'required',
            ]
        );

        Post::updateOrCreate(['id' => $this->postId], [
            'title' => $this->title,
            'description' => $this->description
        ]);

        $this->hideModal();

        session()->flash('info', $this->postId ? 'Post Update Successfully' : 'Post Created Successfully');

        $this->postId = '';
        $this->title = '';
        $this->description = '';
    }

    public function edit($id)
    {
        $post = Post::find($id);
        $this->postId = $post->id;
        $this->title = $post->title;
        $this->description = $post->description;
        $this->showModal();
    }

    public function update()
    {
        $post = Post::updateOrCreate(
            [
                'id'   => $this->post_id,
            ],
            [
                'title' => $this->title,
                'description' => $this->description
            ],

        );
        $this->reset();
    }

    public function destroy($id)
    {
        Post::destroy($id);
    }

    public function render()
    {
        $jurusans = ['matematika', 'ilmu politik'];
        $searchParams = '%' . $this->search . '%';
        return view('livewire.post-form', [
            'posts' => Post::where('title', 'like', $searchParams)->latest()->paginate(5),
            'jurusans' => $jurusans
        ]);
    }

    public function exportExcel()
    {
        return Excel::download(new PostExport, 'siswa.xlsx');
    }

    public function exportPDF()
    {
        $posts = Post::all();
        $pdf = PDF::loadView('export.post', ['posts' => $posts]);
        return $pdf->download('posts.pdf');
    }
}
