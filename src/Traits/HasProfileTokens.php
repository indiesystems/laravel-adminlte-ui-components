<?php

namespace IndieSystems\AdminLteUiComponents\Traits;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

trait HasProfileTokens
{

    public function createToken(Request $request)
    {
        $token = auth()->user()->createToken(Str::random(10));
        return redirect()->back()->with('success', 'User API Token created.')->with('newtoken', $token->plainTextToken);
    }

    public function deleteToken(Request $request)
    {
        $token = auth()->user()->tokens()->where('id', $request->tokenId)->delete();
        return redirect()->back()->with('success', 'User API Token {$request->tokenId} deleted.');
    }
}
