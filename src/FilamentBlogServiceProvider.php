<?php

namespace FireFly\FilamentBlog;

use FireFly\FilamentBlog\Components\Comment;
use FireFly\FilamentBlog\Components\Header;
use FireFly\FilamentBlog\Components\Layout;
use FireFly\FilamentBlog\Components\RecentPost;
use Illuminate\Support\Facades\Route;
use Spatie\LaravelPackageTools\Commands\InstallCommand;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class FilamentBlogServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        $package->name('filament-blog')
            ->hasConfigFile(['filamentblog'])
            ->hasMigration('create_blog_tables')
            ->hasViewComponents('blog', Layout::class, RecentPost::class, Header::class, Comment::class)
            ->hasViews('filament-blog')
            ->hasRoute('web')
            ->hasInstallCommand(function (InstallCommand $installCommand) {
                $installCommand
                    ->startWith(function (InstallCommand $command) {
                        $command->info('Hello, and welcome to my great new package!');
                    })
                    ->publishConfigFile()
                    ->publishMigrations()
                    ->endWith(function (InstallCommand $installCommand) {
                        $installCommand->info("Get ready to breathe easy! Our package has just saved you from a day's worth of headaches and hassle.");
                    });
            });
    }

    public function register()
    {
        Route::bind('post', function ($value) {
            return \FireFly\FilamentBlog\Models\Post::where('slug', $value)->published()->firstOrFail();
        });

        return parent::register(); // TODO: Change the autogenerated stub
    }
}
