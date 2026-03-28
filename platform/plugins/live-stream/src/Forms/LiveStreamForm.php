<?php

namespace Acm\LiveStream\Forms;

use Acm\LiveStream\Http\Requests\LiveStreamRequest;
use Acm\LiveStream\Models\LiveStream;
use Botble\Base\Forms\FieldOptions\DatePickerFieldOption;
use Botble\Base\Forms\Fields\DatePickerField;
use Botble\Base\Forms\FormAbstract;

class LiveStreamForm extends FormAbstract
{
    public function buildForm(): void
    {
        $this
            ->model(LiveStream::class)
            ->setValidatorClass(LiveStreamRequest::class)
            ->withCustomFields()
            ->add('title', 'text', [
                'label'    => trans('plugins/live-stream::live-streams.title'),
                'required' => true,
                'attr'     => ['placeholder' => trans('plugins/live-stream::live-streams.title_placeholder'), 'data-counter' => 255],
            ])
            ->add('embed_url', 'text', [
                'label'    => trans('plugins/live-stream::live-streams.embed_url'),
                'required' => true,
                'attr'     => ['placeholder' => 'https://www.youtube.com/watch?v=...'],
                'help_block' => ['text' => trans('plugins/live-stream::live-streams.embed_url_help')],
            ])
            ->add('source_name', 'text', [
                'label' => trans('plugins/live-stream::live-streams.source_name'),
                'attr'  => ['placeholder' => trans('plugins/live-stream::live-streams.source_name_placeholder'), 'data-counter' => 255],
            ])
            ->add('location', 'text', [
                'label' => trans('plugins/live-stream::live-streams.location'),
                'attr'  => ['placeholder' => 'Rome, Italy', 'data-counter' => 255],
            ])
            ->add('description', 'textarea', [
                'label' => trans('core/base::forms.description'),
                'attr'  => ['rows' => 3, 'placeholder' => trans('plugins/live-stream::live-streams.description_placeholder')],
            ])
            ->add('thumbnail', 'mediaImage', [
                'label' => trans('plugins/live-stream::live-streams.thumbnail'),
            ])
            ->add('openRow', 'html', ['html' => '<div class="row">'])
            ->add('is_live', 'onOff', [
                'label'         => trans('plugins/live-stream::live-streams.is_live'),
                'default_value' => false,
                'wrapper'       => ['class' => 'col-md-4 mb-3'],
                'help_block'    => ['text' => trans('plugins/live-stream::live-streams.is_live_help')],
            ])
            ->add(
                'scheduled_at',
                DatePickerField::class,
                DatePickerFieldOption::make()
                    ->label(trans('plugins/live-stream::live-streams.scheduled_at'))
                    ->placeholder(trans('plugins/live-stream::live-streams.scheduled_at_placeholder'))
                    ->wrapperAttributes(['class' => 'col-md-4 mb-3'])
                    ->withTimePicker()
            )
            ->add('order_column', 'number', [
                'label'         => trans('core/base::forms.order'),
                'attr'          => ['placeholder' => '0'],
                'default_value' => 0,
                'wrapper'       => ['class' => 'col-md-4 mb-3'],
            ])
            ->add('closeRow', 'html', ['html' => '</div>'])
            ->add('status', 'customSelect', [
                'label'   => trans('core/base::tables.status'),
                'choices' => [
                    'published' => trans('core/base::base.published'),
                    'draft'     => trans('core/base::base.draft'),
                ],
            ])
            ->setBreakFieldPoint('status');
    }
}
