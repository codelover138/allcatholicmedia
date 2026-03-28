<?php

namespace Acm\Community\Tables;

use Acm\Community\Models\ForumCategory;
use Botble\Table\Abstracts\TableAbstract;
use Botble\Table\Actions\DeleteAction;
use Botble\Table\Actions\EditAction;
use Botble\Table\BulkActions\DeleteBulkAction;
use Botble\Table\Columns\CreatedAtColumn;
use Botble\Table\Columns\IdColumn;
use Illuminate\Contracts\Database\Eloquent\Builder;

class ForumCategoryTable extends TableAbstract
{
    public function setup(): void
    {
        $this
            ->model(ForumCategory::class)
            ->addActions([
                EditAction::make()->route('community-forums.edit'),
                DeleteAction::make()->route('community-forums.destroy'),
            ])
            ->addColumns([
                IdColumn::make(),
                \Botble\Table\Columns\Column::make('name')
                    ->title(trans('core/base::forms.name'))
                    ->alignLeft()
                    ->orderable(false)
                    ->searchable(false)
                    ->getValueUsing(fn (ForumCategory $item) =>
                        '<a href="' . route('community-forums.edit', $item->id) . '">' . e($item->name) . '</a>'
                    ),
                \Botble\Table\Columns\Column::make('topics_count')
                    ->title(trans('plugins/community::community.topics_count'))
                    ->orderable(false)
                    ->searchable(false),
                CreatedAtColumn::make(),
            ])
            ->addBulkActions([
                DeleteBulkAction::make()->permission('community-forums.destroy'),
            ])
            ->queryUsing(fn (Builder $query) => $query->select(['id', 'name', 'slug', 'topics_count', 'created_at']));
    }

    public function buttons(): array
    {
        return $this->addCreateButton(route('community-forums.create'), 'community-forums.create');
    }
}
