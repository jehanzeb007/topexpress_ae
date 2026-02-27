<?php

namespace Botble\Location\Repositories\Eloquent;

use Botble\Base\Enums\BaseStatusEnum;
use Botble\Language\Facades\Language;
use Botble\Location\Repositories\Interfaces\NeighbourhoodInterface;
use Botble\Support\Repositories\Eloquent\RepositoriesAbstract;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Query\JoinClause;

class NeighbourhoodRepository extends RepositoriesAbstract implements NeighbourhoodInterface
{
    public function filters(?string $keyword, ?int $limit = 10, array $with = [], array $select = ['neighbourhoods.*']): Collection
    {
        $data = $this->model
            ->where('neighbourhoods.status', BaseStatusEnum::PUBLISHED)
            ->leftJoin('states', function (JoinClause $query) {
                $query
                    ->on('states.id', '=', 'neighbourhoods.state_id')
                    ->where('states.status', BaseStatusEnum::PUBLISHED);
            })
            ->join('countries', function (JoinClause $query) {
                $query
                    ->on('countries.id', '=', 'neighbourhoods.country_id')
                    ->where('countries.status', BaseStatusEnum::PUBLISHED);
            });

        if (
            is_plugin_active('language') &&
            is_plugin_active('language-advanced') &&
            Language::getCurrentLocale() != Language::getDefaultLocale()
        ) {
            $data = $data
                ->where(function (Builder $query) use ($keyword) {
                    return $query
                        ->whereHas('translations', function ($query) use ($keyword) {
                            $query->where('name', 'LIKE', '%' . $keyword . '%');
                        })
                        ->orWhereHas('state.translations', function ($query) use ($keyword) {
                            $query->where('name', 'LIKE', '%' . $keyword . '%');
                        });
                });
        } else {
            $data = $data
                ->where(function (Builder $query) use ($keyword) {
                    return $query
                        ->where('neighbourhoods.name', 'LIKE', '%' . $keyword . '%')
                        ->orWhere('states.name', 'LIKE', '%' . $keyword . '%');
                });
        }

        if ($limit) {
            $data = $data->limit($limit);
        }

        if ($with) {
            $data = $data->with($with);
        }

        return $this->applyBeforeExecuteQuery($data)->get($select);
    }
}
