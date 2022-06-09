<?php

namespace App\Http\Livewire;

use App\Models\Report;
use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Builder;
use PowerComponents\LivewirePowerGrid\Rules\{Rule, RuleActions};
use PowerComponents\LivewirePowerGrid\Traits\ActionButton;
use PowerComponents\LivewirePowerGrid\{Button, Column, Exportable, Footer, Header, PowerGrid, PowerGridComponent, PowerGridEloquent};

final class ReportsTable extends PowerGridComponent
{
    use ActionButton;

    /*
    |--------------------------------------------------------------------------
    |  Features Setup
    |--------------------------------------------------------------------------
    | Setup Table's general features
    |
    */
    public function setUp(): array
    {

        return [
            Header::make()->showSearchInput(),
            Footer::make()
                ->showPerPage()
                ->showRecordCount(),
        ];
    }

    /*
    |--------------------------------------------------------------------------
    |  Datasource
    |--------------------------------------------------------------------------
    | Provides data to your Table using a Model or Collection
    |
    */

    /**
     * PowerGrid datasource.
     *
     * @return Builder<\App\Models\Report>
     */
    public function datasource(): Builder
    {
        return Report::query()
            ->where('user_steam_hex', auth()->user()->steam_hex)
            ->join('report_forms', function ($report_forms) {
                $report_forms->on('reports.report_form_id', '=', 'report_forms.id');
            })
            ->select(['reports.*', 'report_forms.title as report_title']);
    }

    /*
    |--------------------------------------------------------------------------
    |  Relationship Search
    |--------------------------------------------------------------------------
    | Configure here relationships to be used by the Search and Table Filters.
    |
    */

    /**
     * Relationship search.
     *
     * @return array<string, array<int, string>>
     */
    public function relationSearch(): array
    {
        return [];
    }

    /*
    |--------------------------------------------------------------------------
    |  Add Column
    |--------------------------------------------------------------------------
    | Make Datasource fields available to be used as columns.
    | You can pass a closure to transform/modify the data.
    |
    */
    public function addColumns(): PowerGridEloquent
    {
        return PowerGrid::eloquent()
            ->addColumn('id')
            ->addColumn('report_form_name')
            ->addColumn('patrol_id')
            ->addColumn('created_at_formatted', fn (Report $model) => Carbon::parse($model->created_at)->format('m/d/Y H:i:s'))
            ->addColumn('updated_at_formatted', fn (Report $model) => Carbon::parse($model->updated_at)->format('m/d/Y H:i:s'));
    }

    /*
    |--------------------------------------------------------------------------
    |  Include Columns
    |--------------------------------------------------------------------------
    | Include the columns added columns, making them visible on the Table.
    | Each column can be configured with properties, filters, actions...
    |
    */

    /**
     * PowerGrid Columns.
     *
     * @return array<int, Column>
     */
    public function columns(): array
    {
        return [
            Column::make('ID', 'id')->searchable(),
            Column::make('REPORT Type', 'report_title', 'report_forms.title')->searchable()->sortable(),
            Column::make('PATROL ID', 'patrol_id')->searchable()->sortable(),
            Column::make('CREATED AT', 'created_at_formatted', 'created_at')->searchable()->sortable(),
            Column::make('UPDATED AT', 'updated_at_formatted', 'updated_at')->searchable()->sortable(),
        ];
    }

    /*
    |--------------------------------------------------------------------------
    | Actions Method
    |--------------------------------------------------------------------------
    | Enable the method below only if the Routes below are defined in your app.
    |
    */

    /**
     * PowerGrid Report Action Buttons.
     *
     * @return array<int, Button>
     */


    public function actions(): array
    {
        return [
            Button::make('show', 'View')
                ->class('bg-blue-500 cursor-pointer text-white px-2 py-1.5 m-1 rounded text-sm')
                ->route('portal.reports.show', ['report' => 'id', 'report_form' => 'report_form_id'])->target('_self'),
        ];
    }


    /*
    |--------------------------------------------------------------------------
    | Actions Rules
    |--------------------------------------------------------------------------
    | Enable the method below to configure Rules for your Table and Action Buttons.
    |
    */

    /**
     * PowerGrid Report Action Rules.
     *
     * @return array<int, RuleActions>
     */

    /*
    public function actionRules(): array
    {
       return [

           //Hide button edit for ID 1
            Rule::button('edit')
                ->when(fn($report) => $report->id === 1)
                ->hide(),
        ];
    }
    */
}
