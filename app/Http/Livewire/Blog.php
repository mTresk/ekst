<?php

namespace App\Http\Livewire;

use App\Models\Article;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Livewire\Component;
use Livewire\WithPagination;

class Blog extends Component
{
    use WithPagination;

    public $category;
    public $search = '';

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function gotoPage($page)
    {
        $this->setPage($page);
        $this->emit('gotoTop');
    }

    public function nextPage()
    {
        $this->setPage($this->page + 1);
        $this->emit('gotoTop');
    }

    public function previousPage()
    {
        $this->setPage(max($this->page - 1, 1));
        $this->emit('gotoTop');
    }

    public function paginationView(): string
    {
        return 'layout.pagination';
    }

    public function mount($category = null)
    {
        $this->category = $category;
    }

    public function setCategory($id)
    {
        $this->category = $id;
    }

    public function render(): Factory|View|Application
    {
        $query = Article::where('title', 'like', '%' . $this->search . '%');

        if ($this->category) {
            $query->where('category_id', $this->category);
        }

        return view('livewire.blog',
            ['articles' => $query
                ->where('published_at', '<=', now())
                ->orderBy('published_at', 'DESC')
                ->paginate(9)])
            ->extends('layout.app');
    }
}
