<?php


namespace App\Http\Middleware;


use App\Models\Permission;
use Closure;
use Spatie\Permission\Exceptions\UnauthorizedException;

class PermissionMiddleware
{
	public function handle($request, Closure $next, $permission)
	{
		$group_permission = config('permission.group_permission') ?? [];
		$permissions = is_array($permission)
			? $permission
			: explode('|', $permission);

		$admin = \Auth::guard('admins')->user();
		foreach ($permissions as $key => $permission) {
			$indexPermission = 0;
			if (isset(array_keys($group_permission, $permission)[0])) {
				$indexPermission = array_keys($group_permission, $permission)[0];
			};
			\Log::info($indexPermission);
			$pers = Permission::select('name')->where('group_permission', $indexPermission)->first();
			if (isset($pers) && $admin->can($pers['name'])) {
				return $next($request);
			}
		}

		throw UnauthorizedException::forPermissions($permissions);
	}

	protected function canPermission($permission)
	{
		return Permission::where('name', $permission)->first();
	}
}
