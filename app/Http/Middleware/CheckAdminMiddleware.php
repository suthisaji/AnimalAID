<?php

namespace App\Http\Middleware;
use App\Repositories\UserRepositoryInterface;
use Auth;
use Closure;

class CheckAdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
     public function __construct(UserRepositoryInterface $UserRepository)
   {
       $this->UserRepository = $UserRepository;
   }


    public function handle($request, Closure $next)
    {
      $result = $this->UserRepository->isAdmin(Auth::user()->username);
      if($result){
              return redirect('/admin');
      }else{
          return $next($request);
      }
    }
}
