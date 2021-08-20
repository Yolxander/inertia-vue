<?php

namespace App\Http\Controllers;

use App\Http\Resources\GithubUsersResource;
use App\Models\GithubUser;
use App\Services\GithubUsersService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class SearchController extends Controller
{
    public function search(Request $request, GithubUsersService $user)
    {
        $users = GithubUser::query();
        if ($request->has('search')) {
            $user = $user->search($request->search);
            $users->where('user_name', 'LIKE', '%' . str_replace(' ', '-', $request->search) . '%');
        }

        if ($request->has('filter')) {
            $users->where('user_name', 'LIKE', '%' . str_replace(' ', '-', $request->filter) . '%');
        }

        if ($request->has('orderBy')) {
            $users->orderBy('user_name', $request->orderBy);
        }
        return inertia('Dashboard', [
            'users' => function () use ($users) {
                return GithubUsersResource::collection(
                    $users->paginate(3)->withQueryString()
                );
            },
        ]);
    }

    public function destroy(GithubUser $githubUser)
    {
        if ($githubUser->exists) {
            $githubUser->delete();
            return back(303);
        }

        GithubUser::all()->each(function ($u) {
            $u->delete();
        });
        return back(303);
    }
}
