<?php

namespace Botble\Location\Http\Controllers;

use Botble\Base\Facades\BaseHelper;
use Botble\Base\Http\Actions\DeleteResourceAction;
use Botble\Base\Http\Controllers\BaseController;
use Botble\Base\Supports\Breadcrumb;
use Botble\Location\Forms\NeighbourhoodForm;
use Botble\Location\Http\Requests\NeighbourhoodRequest;
use Botble\Location\Http\Resources\NeighbourhoodResource;
use Botble\Location\Models\City;
use Botble\Location\Models\Neighbourhood;
use Botble\Location\Tables\NeighbourhoodTable;
use Illuminate\Http\Request;

class NeighbourhoodController extends BaseController
{
    protected function breadcrumb(): Breadcrumb
    {
        return parent::breadcrumb()
            ->add(trans('plugins/location::location.name'))
            ->add(trans('plugins/location::neighbourhood.name'), route('neighbourhood.index'));
    }

    public function index(NeighbourhoodTable $table)
    {
        $this->pageTitle(trans('plugins/location::neighbourhood.name'));

        return $table->renderTable();
    }

    public function create()
    {
        $this->pageTitle(trans('plugins/location::neighbourhood.create'));

        return NeighbourhoodForm::create()->renderForm();
    }

    public function store(NeighbourhoodRequest $request)
    {
        $form = NeighbourhoodForm::create()->setRequest($request);
        $form->save();

        return $this
            ->httpResponse()
            ->setPreviousRoute('neighbourhood.index')
            ->setNextRoute('neighbourhood.edit', $form->getModel()->getKey())
            ->withCreatedSuccessMessage();
    }

    public function edit(Neighbourhood $neighbourhood)
    {
        $this->pageTitle(trans('core/base::forms.edit_item', ['name' => $neighbourhood->name]));

        return NeighbourhoodForm::createFromModel($neighbourhood)->renderForm();
    }

    public function update(Neighbourhood $neighbourhood, NeighbourhoodRequest $request)
    {
        NeighbourhoodForm::createFromModel($neighbourhood)->setRequest($request)->save();

        return $this
            ->httpResponse()
            ->setPreviousRoute('neighbourhood.index')
            ->withUpdatedSuccessMessage();
    }

    public function destroy(Neighbourhood $neighbourhood)
    {
        return DeleteResourceAction::make($neighbourhood);
    }

    public function getList(Request $request)
    {
        $keyword = BaseHelper::stringify($request->input('q'));

        if (! $keyword) {
            return $this
                ->httpResponse()
                ->setData([]);
        }

        $data = Neighbourhood::query()
            ->where('name', 'LIKE', '%' . $keyword . '%')
            ->select(['id', 'name'])
            ->take(10)
            ->orderBy('order')
            ->orderBy('name')
            ->get();

        $data->prepend(new Neighbourhood(['id' => 0, 'name' => trans('plugins/location::neighbourhood.select_neighbourhood')]));

        return $this
            ->httpResponse()
            ->setData(NeighbourhoodResource::collection($data));
    }

    public function ajaxGetNeighbourhoods(Request $request)
    {
        $data = Neighbourhood::query()
            ->select(['id', 'name'])
            ->wherePublished()
            ->orderBy('order')
            ->orderBy('name');

        $stateId = $request->input('state_id');

        if ($stateId && $stateId != 'null') {
            $data = $data->where('state_id', $stateId);
        }

        $countryId = $request->input('country_id');

        if ($countryId && $countryId != 'null') {
            $data = $data->where('country_id', $countryId);
        }

        $cityId = $request->input('city_id');
        if ($cityId && $cityId != 'null') {
            $data = $data->where('city_id', $cityId);
        }

        $keyword = BaseHelper::stringify($request->query('k'));

        if ($keyword) {
            $data = $data
                ->where('name', 'LIKE', '%' . $keyword . '%')
                ->paginate(10);
        } else {
            $data = $data->get();
        }

        if ($keyword) {
            return $this
                ->httpResponse()
                ->setData([NeighbourhoodResource::collection($data), 'total' => $data->total()]);
        }

        $data->prepend(new Neighbourhood(['id' => 0, 'name' => trans('plugins/location::neighbourhood.select_neighbourhood')]));

        return $this
            ->httpResponse()
            ->setData(NeighbourhoodResource::collection($data));
    }
}
