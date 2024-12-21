<?php
declare(strict_types=1);


namespace App\Providers;

use App\Interfaces\MoodImageRepositoryInterface;
use App\Interfaces\MoodPostRepositoryInterface;
use App\Interfaces\MoodRepositoryInterface;
use Illuminate\Support\ServiceProvider;
use App\Interfaces\UserRepositoryInterface;
use App\Repositories\MoodImageRepository;
use App\Repositories\MoodPostRepository;
use App\Repositories\MoodRepository;
use App\Repositories\UserRepository;
use Illuminate\Contracts\Routing\ResponseFactory;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(UserRepositoryInterface::class, UserRepository::class);
        $this->app->bind(MoodRepositoryInterface::class, MoodRepository::class);
        $this->app->bind(MoodImageRepositoryInterface::class, MoodImageRepository::class);
        $this->app->bind(MoodPostRepositoryInterface::class, MoodPostRepository::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {

    }
}
