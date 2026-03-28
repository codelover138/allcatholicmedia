<?php

namespace Acm\Community\Http\Controllers\Admin;

use Acm\Community\Forms\ForumCategoryForm;
use Acm\Community\Http\Requests\Admin\ForumCategoryRequest;
use Acm\Community\Models\ForumCategory;
use Botble\Base\Forms\FormBuilder;
use Botble\Base\Http\Actions\DeleteResourceAction;
use Botble\Base\Http\Controllers\BaseController;
use Botble\Base\Http\Responses\BaseHttpResponse;
use Botble\Base\Supports\Breadcrumb;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;

class ForumCategoryController extends BaseController
{
    protected function breadcrumb(): Breadcrumb
    {
        return parent::breadcrumb()
            ->add(trans('plugins/community::community.forum_categories'), route('community-forums.index'));
    }

    public function index(\Acm\Community\Tables\ForumCategoryTable $table): View|JsonResponse
    {
        $this->pageTitle(trans('plugins/community::community.forum_categories'));

        return $table->renderTable();
    }

    public function create(FormBuilder $formBuilder): string
    {
        $this->pageTitle(trans('plugins/community::community.create_forum_category'));

        return $formBuilder->create(ForumCategoryForm::class)->renderForm();
    }

    public function store(ForumCategoryRequest $request): BaseHttpResponse
    {
        ForumCategory::query()->create($request->validated());

        return $this->httpResponse()
            ->setPreviousUrl(route('community-forums.index'))
            ->setNextUrl(route('community-forums.index'))
            ->withCreatedSuccessMessage();
    }

    public function edit(ForumCategory $forumCategory, FormBuilder $formBuilder): string
    {
        $this->pageTitle(trans('core/base::forms.edit_item', ['name' => $forumCategory->name]));

        return $formBuilder->create(ForumCategoryForm::class, ['model' => $forumCategory])->renderForm();
    }

    public function update(ForumCategory $forumCategory, ForumCategoryRequest $request): BaseHttpResponse
    {
        $forumCategory->update($request->validated());

        return $this->httpResponse()
            ->setPreviousUrl(route('community-forums.index'))
            ->withUpdatedSuccessMessage();
    }

    public function destroy(ForumCategory $forumCategory): DeleteResourceAction
    {
        return DeleteResourceAction::make($forumCategory);
    }
}
