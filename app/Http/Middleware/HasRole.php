<?php

namespace App\Http\Middleware;


use App\Http\Model\User;
use Closure;

class HasRole
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
        // 获取当前请求的路由
        $route = \Route::current()->getActionName();
//        dd($route);
//        if(当前请求的路由不在当前用户拥有的权限里){
//            返回到原来的页面
//        }
        // 2 获取用户所有的权限
        // 2.1获取用户所有的角色
        $roles = User::find(session('user')->user_id)->roles()->get();

        // 声明一个数组,存放所有的权限
        $arr = [];
        // 2.2获取属于这个角色的权限
        foreach ($roles as $k=>$role){
            $permissions = $role->permissions()->get();
            foreach ($permissions as $m=>$per){
//                获取权限记录的name路由字段
                $arr[] = $per['name'];
            }
        }
//        dd($arr);
//      将重复的权限去掉
        $a = array_unique($arr);
//        dd($a);
//        3 判断当前路由是否在权限路由中
        if(!in_array($route,$a)){
            return redirect('/back');
        }
        return $next($request);
    }
}
