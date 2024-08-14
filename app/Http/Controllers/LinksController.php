<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Links;
use App\Models\User;
use Laravel\Ui\Presets\React;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class LinksController extends Controller
{

    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $namaDomain = env('APP_URL');
        $page = 5;
        $user_logged = auth()->id();
        $urls = Links::where('user_id', $user_logged)->paginate($page);
        $clicks = Links::where('user_id', $user_logged)->sum('clicks');
        $totalUrl = Links::where('user_id', $user_logged)->count();
        return view('dashboardUser')
        ->with('urls', $urls)
        ->with('domain', $namaDomain)
        ->with('clicks', $clicks)
        ->with('totalUrl', $totalUrl);
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
        $request->validate([
            'original_url' => 'required|url',
            'shortened_url' => 'required|unique:links,shortened_url',
        ], [
            'original_url.required' => 'URL wajib diisi',
            'original_url.url' => 'URL tidak valid',
            'shortened_url.required' => 'Custom URL wajib diisi',
            'shortened_url.unique' => 'Custom URL telah terdaftar',
        ]);

        $data = [
            'user_id' => auth()->id(),
            'original_url' => $request->original_url,
            'shortened_url' => $request->shortened_url,
            'clicks' => 0,
        ];
        Links::create($data);
        return redirect()->route('dashboard')->with('success', 'URL berhasil dibuat.');
    }

    public function shortenedUrl($shortened_url)
    {
        $url = Links::where('shortened_url', $shortened_url)->first();
        if (!$url) {
            return redirect()->route('landing');
        }
        $url->increment('clicks');
        return redirect($url->original_url);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $request->validate([
            'original_url' => 'required|url',
            'shortened_url' => 'required|unique:links,shortened_url',
        ], [
            'original_url.required' => 'URL wajib diisi',
            'original_url.url' => 'URL tidak valid',
            'shortened_url.required' => 'Custom URL wajib diisi',
            'shortened_url.unique' => 'Custom URL telah terdaftar',
        ]);

        $data = [
            'user_id' => auth()->id(),
            'original_url' => $request->original_url,
            'shortened_url' => $request->shortened_url,
            'clicks' => 0,
        ];
        Links::where('id', $request->id)->update($data);
        return redirect()->route('dashboard')->with('success', 'URL berhasil diedit');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $id)
    {
        Links::where('id', $id->id)->delete();
        return redirect()->route('dashboard')->with('success', 'URL berhasil dihapus');
    }

    public function changePassword(Request $request){
        $user_logged = auth()->id();
        $user = User::find($user_logged);

        if(!Hash::check($request->current_password, $user->password)){
            return back()->withErrors(['current_password' => 'Password Lama Salah']);
        }
        if($request->new_password != $request->confirm_password){
            return back()->withErrors(['confirm_password' => 'Masukkan dengan password baru yang sama']);
        }

        $user->password = Hash::make($request->new_password);
        $user->save();
        return redirect()->route('dashboard')->with('success', 'Password Berhasil Diubah');
    }
}
