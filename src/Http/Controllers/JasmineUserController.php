<?php

namespace Jasmine\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Jasmine\Models\JasmineUser;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class JasmineUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Database\Eloquent\Collection|\Illuminate\Http\Response|JasmineUser[]
     */
    public function index()
    {
        return JasmineUser::all();


        $response = DataTables::of(JasmineUser::query());

        return $response->toJson();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response|JasmineUser
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name'  => 'required|string|min:2|max:255',
            'email' => 'required|string|email|max:255|unique:jasmine_users',
        ]);

        $data['password'] = Hash::make(Str::random(64));

        /** @var JasmineUser $user */
        $user = JasmineUser::create($data);

        $response = Password::broker('jasmine_users')->sendResetLink($user->only('email'));

        return $user;
    }

    /**
     * Display the specified resource.
     *
     * @param  \Jasmine\Models\JasmineUser $jasmineUser
     *
     * @return \Illuminate\Http\Response
     */
    public function show(JasmineUser $jasmineUser)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \Jasmine\Models\JasmineUser $jasmineUser
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(JasmineUser $jasmineUser)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request    $request
     * @param  \Jasmine\Models\JasmineUser $jasmineUser
     *
     * @return array|\Illuminate\Http\Response
     */
    public function update(Request $request, JasmineUser $jasmineUser)
    {
        $data = $request->validate([
            'name'  => 'required|string|min:2|max:255',
            'email' => 'required|string|email|max:255|unique:jasmine_users,email,' . $jasmineUser->id,
        ]);

        $result = $jasmineUser->update($data);

        return ['success' => $result];
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Jasmine\Models\JasmineUser $jasmineUser
     *
     * @return array|\Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(JasmineUser $jasmineUser)
    {
        Validator::make(['id' => $jasmineUser->id], ['id' => 'not_in:' . Auth::user()->id,], [
            'id.not_in' => 'You cannot delete yourself.',
        ])->validate();


        return [
            'success' => $jasmineUser->delete(),
        ];
    }
}
