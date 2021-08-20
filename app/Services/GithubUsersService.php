<?php
namespace App\Services;

use App\Models\GithubUser;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Validator;

class GithubUsersService
{
    public function search(String $search = null)
    {
        $data = Validator::make(
            ['search' => $search],
            ['search' => 'required|string']
        )->validate();
        return GithubUser::where('user_name', str_replace(' ', '-', $data['search']))->firstOr(function () use (&$user, $data) {
            $profile_url = 'https://api.github.com/users/' . str_replace(' ', '-', $data['search']);
            $stars_url = $profile_url . '/starred';
            $user = Http::get($profile_url);
            $stats = Http::get($stars_url);
            if ($user->status() !== 200 || $stats->status() !== 200) {
                return abort(404);
            }
            $data = $user->json();
            return GithubUser::create([
                'github_id' => $data['id'],
                'user_name' => $data['login'],
                'name' => $data['name'],
                'followers' => $data['followers'],
                'stars' => $stats->json()[0]['stargazers_count'],
                'github_profile_url' => $data['html_url'],
                'repos_url' => $data['repos_url'],
            ]);
        });
    }
}
