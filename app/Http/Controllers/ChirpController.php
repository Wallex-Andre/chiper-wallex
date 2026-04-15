<?php

namespace App\Http\Controllers;

use App\Models\Chirp;
use App\Models\User;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;

class ChirpController extends Controller
{
    use AuthorizesRequests;

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $chirps = Chirp::with('user')
            ->latest()
            ->take(50)
            ->get();

        return view('home', ['chirps' => $chirps]);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'message' => 'required|string|max:255',
        ], [
            'message.required' => 'Please write something to chirp!',
            'message.max' => 'Chirps must be 255 characters or less.',
        ]);

        auth()->user()->chirps()->create($validated);

        return redirect('/')->with('success', 'Your chirp has been posted!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    public function user_chirps()
    {
        $chirps = auth()->user()->chirps()->latest()->get();

        $user = auth()->user()->name;

        return view('chirps.user-chirps', compact('chirps', 'user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Chirp $chirp)
    {
        $this->authorize('update', $chirp);

        return view('chirps.edit', compact('chirp'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Chirp $chirp)
    {
        $this->authorize('update', $chirp);

        $validated = $request->validate([
            'message' => 'required|string|max:255',
        ], [
            'message.required' => 'Please write something to chirp!',
            'message.max' => 'Chirps must be 255 characters or less.',
        ]);

        $chirp->update($validated);

        return redirect('/')->with('success', 'Your chirp has been update!');
    }

    public function search(Request $request)
    {
        $query = trim($request->input('query'));

        if (! $query) {
            return view('search-results', [
                'chirps' => collect(),
                'users' => collect(),
                'query' => $query,
            ]);
        }

        $chirps = Chirp::where('message', 'like', "%{$query}%")
            ->latest()
            ->get();

        $users = User::where('name', 'like', "%{$query}%")
            ->get();

        return view('search-results', [
            'chirps' => $chirps,
            'users' => $users,
            'query' => $query,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Chirp $chirp)
    {

        $this->authorize('delete', $chirp);

        $chirp->delete();

        return redirect('/')->with('success', 'Your chirp has been deleted!');
    }
}
