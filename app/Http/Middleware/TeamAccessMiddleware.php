<?php

namespace App\Http\Middleware;

use Closure;

class TeamAccessMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $owner_team_info = \DB::table('teams')
            ->select('id', 'owner_user_id')
            ->where('owner_user_id', '=', \Auth::user()->id)
            ->get();

        foreach ($owner_team_info as $entity) {
            if(\Auth::user()->id == $entity->owner_user_id) {
                return $next($request);
            }
        }

        //todo: допилить view для 401 страницы
        return response('Нет прав на просмотр данной страницы', 401);
    }
}
