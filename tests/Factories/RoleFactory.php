<?php

namespace Tests\Factories;

use App\Domain\CMS\Models\Article;
use Christophrumpel\LaravelFactoriesReloaded\BaseFactory;
use Faker\Generator as Faker;
use Aammui\RolePermission\Models\Role;
use Illuminate\Support\Str;

class RoleFactory extends BaseFactory
{
    protected string $modelClass = Role::class;

    public function create(array $extra = []): Role
    {
        return parent::build($extra);
    }

    public function make(array $extra = []): Role
    {
        return parent::build($extra, 'make');
    }

    public function getDefaults(Faker $faker): array
    {
        return [];
    }

    public static function role200StatusRoutes()
    {
        return [
            yield ['admin/roles', 200]
        ];
    }
}
