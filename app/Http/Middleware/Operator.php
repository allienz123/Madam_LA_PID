<?php namespace App\Http\Middleware;

use Closure;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Contracts\Routing\Middleware;
use Illuminate\Contracts\Routing\ResponseFactory;

use App\AssignedRoles;

class Operator implements Middleware {

    /**
     * The Guard implementation.
     *
     * @var Guard
     */
    protected $auth;

    /**
     * The response factory implementation.
     *
     * @var ResponseFactory
     */
    protected $response;

    /**
     * Create a new filter instance.
     *
     * @param  Guard  $auth
     * @param  ResponseFactory  $response
     * @return void
     */
    public function __construct(Guard $auth, ResponseFactory $response)
    {
        $this->auth = $auth;
        $this->response = $response;
    }
    /**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @return mixed
	 */
	public function handle($request, Closure $next)
	{
        if ($this->auth->check())
        {
            $admin = 0;
            if($this->auth->user()->confirmed==0 && $this->auth->user()->admin==0)
            {
                return response(['error' => ['code' => 'Not_Activated | Banned','description' => 'You are not authorized to access this resource. Please ask your Administrator']], 401);
                //return redirect('/')->with('status', 'You are not authorized to access this resource !!!');
            }
            return $next($request);
        }
        return $this->response->redirectTo('/');
	}

}
