<?php

namespace App\Nova;

use Illuminate\Http\Request;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Http\Requests\NovaRequest;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Date;
use Laravel\Nova\Fields\DateTime;

class Event extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var class-string<\App\Models\Event>
     */
    public static $model = \App\Models\Event::class;

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'tittle';

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'id','title'
    ];

    /**
     * Get the fields displayed by the resource.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @return array
     */
    public function fields(NovaRequest $request)
    {
        return [
            ID::make()->sortable(),
            Text::make('Title')
                ->sortable()
                ->onlyOnIndex()
                ->displayUsing(function ($value) {
                    return substr($value, 0, 35) . '...';
                }),

            Text::make('Title')
                ->rules('required', 'string')
                ->hideFromIndex(),

            Text::make('Description')
                ->sortable()
                ->onlyOnIndex()
                ->displayUsing(function ($value) {
                    return substr($value, 0, 35) . '...';
                }),

            Text::make('Description')
                ->rules('required', 'string')
                ->hideFromIndex(),

            Text::make('Location')
                ->sortable()
                ->rules('required', 'string'),

            Text::make('Location Address')
                ->sortable()
                ->rules('required', 'string'),

            Date::make('Start Date')
                ->sortable()
                ->rules('string'),

            Date::make('End Date')
                ->sortable()
                ->rules('string'),

            // DateTime::make('Start Time'),
            // DateTime::make('End Time'),

            Text::make('Start Time')->resolveUsing(function ($date) {
                $timestamp = new \DateTime($date);
                return $timestamp->format('H:i');
            })->rules('date_format:"H:i"')->withMeta(['extraAttributes' => ['type' => 'time']]),

            Text::make('End Time')->resolveUsing(function ($date) {
                $timestamp = new \DateTime($date);
                return $timestamp->format('H:i');
            })->rules('date_format:"H:i"')->withMeta(['extraAttributes' => ['type' => 'time']]),

            Text::make('Venue Name')
                ->sortable()
                ->rules( 'string'),


        ];
    }

    /**
     * Get the cards available for the request.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @return array
     */
    public function cards(NovaRequest $request)
    {
        return [];
    }

    /**
     * Get the filters available for the resource.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @return array
     */
    public function filters(NovaRequest $request)
    {
        return [];
    }

    /**
     * Get the lenses available for the resource.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @return array
     */
    public function lenses(NovaRequest $request)
    {
        return [];
    }

    /**
     * Get the actions available for the resource.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @return array
     */
    public function actions(NovaRequest $request)
    {
        return [];
    }
}
