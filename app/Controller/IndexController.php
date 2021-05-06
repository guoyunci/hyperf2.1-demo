<?php

declare(strict_types=1);
/**
 * This file is part of Hyperf.
 *
 * @link     https://www.hyperf.io
 * @document https://hyperf.wiki
 * @contact  group@hyperf.io
 * @license  https://github.com/hyperf/hyperf/blob/master/LICENSE
 */
namespace App\Controller;

use App\Job\FooJob;
use Hyperf\HttpServer\Annotation\AutoController;

/**
 * @AutoController(prefix="index")
 */
class IndexController extends Controller
{
    public function index()
    {
        $user = $this->request->input('user', 'Hyperf');
        $method = $this->request->getMethod();

        return [
            'method' => $method,
            'message' => "Hello {$user}.",
        ];
    }
    
    public function job()
    {
        queue_push(new FooJob($id = uniqid()), 10);
        return $this->response->success($id);
    }
}
