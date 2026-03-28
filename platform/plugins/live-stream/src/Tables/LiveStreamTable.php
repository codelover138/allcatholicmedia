<?php

namespace Acm\LiveStream\Tables;

use Acm\LiveStream\Models\LiveStream;
use Botble\Table\Abstracts\TableAbstract;
use Botble\Table\Actions\DeleteAction;
use Botble\Table\Actions\EditAction;
use Botble\Table\BulkActions\DeleteBulkAction;
use Botble\Table\BulkChanges\CreatedAtBulkChange;
use Botble\Table\BulkChanges\SelectBulkChange;
use Botble\Table\Columns\CreatedAtColumn;
use Botble\Table\Columns\IdColumn;
use Botble\Table\Columns\YesNoColumn;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Validation\Rule;

class LiveStreamTable extends TableAbstract
{
    public function setup(): void
    {
        $this
            ->model(LiveStream::class)
            ->addActions([
                EditAction::make()->route('live-streams.edit'),
                DeleteAction::make()->route('live-streams.destroy'),
            ])
            ->addColumns([
                IdColumn::make(),
                \Botble\Table\Columns\Column::make('title')
                    ->title(trans('plugins/live-stream::live-streams.title'))
                    ->alignLeft()
                    ->orderable(false)
                    ->searchable(false)
                    ->getValueUsing(function (LiveStream $item) {
                        return '<a href="' . route('live-streams.edit', $item->id) . '">' . e($item->title) . '</a>';
                    }),
                \Botble\Table\Columns\Column::make('source_name')
                    ->title(trans('plugins/live-stream::live-streams.source_name'))
                    ->alignLeft()
                    ->orderable(false)
                    ->searchable(false),
                YesNoColumn::make('is_live')
                    ->title(trans('plugins/live-stream::live-streams.is_live')),
                \Botble\Table\Columns\Column::make('scheduled_at')
                    ->title(trans('plugins/live-stream::live-streams.scheduled_at'))
                    ->orderable(false)
                    ->searchable(false)
                    ->getValueUsing(fn (LiveStream $item) => $item->scheduled_at?->format('Y-m-d H:i') ?? '—'),
                CreatedAtColumn::make(),
            ])
            ->addBulkActions([
                DeleteBulkAction::make()->permission('live-streams.destroy'),
            ])
            ->addBulkChanges([
                SelectBulkChange::make()
                    ->name('is_live')
                    ->title(trans('plugins/live-stream::live-streams.is_live'))
                    ->choices([1 => trans('core/base::base.yes'), 0 => trans('core/base::base.no')])
                    ->type('customSelect')
                    ->validate(['required', Rule::in([0, 1])]),
                CreatedAtBulkChange::make(),
            ])
            ->queryUsing(fn (Builder $query) => $query->select([
                'id', 'title', 'source_name', 'is_live', 'scheduled_at', 'status', 'created_at',
            ]));
    }

    public function buttons(): array
    {
        return $this->addCreateButton(route('live-streams.create'), 'live-streams.create');
    }
}
