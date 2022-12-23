<?php

namespace App\Http\Livewire\Public;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class Users extends Component
{
    use WithPagination;

    public $search = '';
    public $order = 'postsDesc';

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function updatingOrder()
    {
        $this->resetPage();
    }

    public function setOrder($order)
    {
        $this->order = $order;
    }

    public function orderModelBy(string $model, string $order)
    {
        if ($order == 'asc') {
            return User::withCount($model)->orderBy($model . '_count')->where('name', 'like', '%' . $this->search . '%')->paginate(20);
        }
        if ($order == 'desc') {
            return User::withCount($model)->orderByDesc($model . '_count')->where('name', 'like', '%' . $this->search . '%')->paginate(20);
        }
    }

    public function filterSearch()
    {
        if (str_contains($this->order, 'Asc')) {
            return $this->orderModelBy(str_replace('Asc', '', $this->order), 'asc');
        }

        if (str_contains($this->order, 'Desc')) {
            return $this->orderModelBy(str_replace('Desc', '', $this->order), 'desc');
        }
    }

    public function render()
    {
        return view('livewire.public.users', [
            'users' => $this->filterSearch(),
        ]);
    }
}
