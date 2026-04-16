<?php

namespace App\Http\Controllers;

use App\Models\Chirp;
use App\Models\User;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
            'image' => 'nullable|image|max:10248',
            'audio' => 'nullable|mimes:mp3,wav|max:10248',
        ]);

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('chirp-images', 'public');
        }

        if ($request->hasFile('audio')) {
            $validated['audio'] = $request->file('audio')->store('chirp-audio', 'public');
        }

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
            'image' => 'nullable|image|max:5048',
            'audio' => 'nullable|mimes:mp3,wav|max:5048',
            'remove_image' => 'nullable',
            'remove_audio' => 'nullable',
        ]);

        if ($request->has('remove_image')) {
            if ($chirp->image) {
                \Storage::disk('public')->delete($chirp->image);
            }
            $chirp->image = null;
        }

        if ($request->has('remove_audio')) {
            if ($chirp->audio) {
                \Storage::disk('public')->delete($chirp->audio);
            }
            $chirp->audio = null;
        }

        if ($request->hasFile('image')) {
            if ($chirp->image) {
                \Storage::disk('public')->delete($chirp->image);
            }

            $chirp->image = $request->file('image')->store('chirp-images', 'public');
        }

        if ($request->hasFile('audio')) {
            if ($chirp->audio) {
                \Storage::disk('public')->delete($chirp->audio);
            }

            $chirp->audio = $request->file('audio')->store('chirp-audio', 'public');
        }

        $chirp->message = $validated['message'];

        $chirp->save();

        return redirect('/')->with('success', 'Your chirp has been updated!');
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
