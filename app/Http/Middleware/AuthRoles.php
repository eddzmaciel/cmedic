<?php namespace App\Http\Middleware;

use Closure;

class AuthRoles {

	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @return mixed
	 */
	public function handle($request, Closure $next)
	{
		// Get the required roles from the route
		$roles = $this->getRequiredRoleForRoute($request->route());

		// Check if a role is required for the route, and
		// if so, ensure that the user has that role.
		if($request->user()->estatus != 0){
			return response([
				'error' => [
					'code' => 'SUSPENDED USER',
					'description' => 'You are not authorized to access this resource.'
				]
			], 401);
		}
		if($request->user()->hasRole($roles) || !$roles)
		{
			return $next($request);
		}
		return response([
			'error' => [
				'code' => 'INSUFFICIENT_ROLE',
				'description' => 'You are not authorized to access this resource.'
			]
		], 401);
	}

	private function getRequiredRoleForRoute($route)
	{
		$actions = $route->getAction();
		return isset($actions['roles']) ? $actions['roles'] : null;
	}

}
