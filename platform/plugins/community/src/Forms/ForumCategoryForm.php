<?php

namespace Acm\Community\Forms;

use Acm\Community\Http\Requests\Admin\ForumCategoryRequest;
use Acm\Community\Models\ForumCategory;
use Botble\Base\Forms\FormAbstract;

class ForumCategoryForm extends FormAbstract
{
    public function buildForm(): void
    {
        $this
            ->model(ForumCategory::class)
            ->setValidatorClass(ForumCategoryRequest::class)
            ->add('name', 'text', [
                'label'    => trans('core/base::forms.name'),
                'required' => true,
                'attr'     => ['data-counter' => 255],
            ])
            ->add('slug', 'text', [
                'label'    => 'Slug',
                'required' => true,
                'attr'     => ['data-counter' => 255],
            ])
            ->add('description', 'textarea', [
                'label' => trans('core/base::forms.description'),
                'attr'  => ['rows' => 3],
            ])
            ->add('order_column', 'number', [
                'label'         => trans('core/base::forms.order'),
                'default_value' => 0,
            ])
            ->setBreakFieldPoint('order_column');
    }
}
