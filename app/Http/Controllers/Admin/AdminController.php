<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Obat;
use App\Models\Pasien;
use App\Models\Perjanjian;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\User\UserRequest;

class AdminController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    // $perjanjians = Perjanjian::with('pasien')->where('pasien_id', Auth::user()->id)->get();
    // $data  = [
    //   'pasiens' => $perjanjians
    // ];
    // return view('home', $data);

    $user = User::all();
    $data = [
      'users' => $user,
      'active' => 'user'
      // 'pasiens' => $pasien
    ];
    return view('admin.pasien.index', $data);
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    $data = [
      'active' => 'admin.create'
    ];
    return view('admin.pasien.create', $data);
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(UserRequest $request)
  {
    $validatedData = $request->all();
    $validatedData['password'] = bcrypt('password');
    $validatedData['password_confirmation'] = bcrypt('password');
    User::create($validatedData);
    return redirect()->route('admin.index');
  }

  /**
   * Display the specified resource.
   *
   * @param  \App\Models\User  $user
   * @return \Illuminate\Http\Response
   */
  public function show(User $user)
  {
    //
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\Models\User  $user
   * @return \Illuminate\Http\Response
   */
  public function edit(User $user, $id)
  {
    $users = User::find($id);
    $data = [
      'user' => $users,
      'active' => 'admin.edit'
    ];
    return view('admin.pasien.edit', $data);
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\Models\User  $user
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, $id)
  {
    $validatedData = $request->all();
    $user = User::find($id);
    $validatedData['role'] = $request->role;
    $user->update($validatedData);
    return redirect()->route('admin.index');
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Models\User  $user
   * @return \Illuminate\Http\Response
   */
  public function destroy(User $admin)
  {
    $admin->delete();
    return redirect()->route('admin.index');
  }
}
