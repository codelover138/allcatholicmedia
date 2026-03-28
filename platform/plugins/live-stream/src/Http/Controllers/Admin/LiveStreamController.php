<?php

namespace Acm\LiveStream\Http\Controllers\Admin;

use Acm\LiveStream\Forms\LiveStreamForm;
use Acm\LiveStream\Http\Requests\LiveStreamRequest;
use Acm\LiveStream\Models\LiveStream;
use Acm\LiveStream\Tables\LiveStreamTable;
use Botble\Base\Events\BeforeUpdateContentEvent;
use Botble\Base\Events\CreatedContentEvent;
use Botble\Base\Events\UpdatedContentEvent;
use Botble\Base\Forms\FormBuilder;
use Botble\Base\Http\Actions\DeleteResourceAction;
use Botble\Base\Http\Controllers\BaseController;
use Botble\Base\Http\Responses\BaseHttpResponse;
use Botble\Base\Supports\Breadcrumb;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;

class LiveStreamController extends BaseController
{
    protected function breadcrumb(): Breadcrumb
    {
        return parent::breadcrumb()
            ->add(trans('plugins/live-stream::live-streams.name'), route('live-streams.index'));
    }

    public function index(LiveStreamTable $table): View|JsonResponse
    {
        $this->pageTitle(trans('plugins/live-stream::live-streams.name'));

        return $table->renderTable();
    }

    public function create(FormBuilder $formBuilder): string
    {
        $this->pageTitle(trans('plugins/live-stream::live-streams.create'));

        return $formBuilder->create(LiveStreamForm::class)->renderForm();
    }

    public function store(LiveStreamRequest $request): BaseHttpResponse
    {
        $stream = LiveStream::query()->create($request->validated());

        event(new CreatedContentEvent('live-stream', $request, $stream));

        return $this->httpResponse()
            ->setPreviousUrl(route('live-streams.index'))
            ->setNextUrl(route('live-streams.edit', $stream->getKey()))
            ->withCreatedSuccessMessage();
    }

    public function edit(LiveStream $liveStream, FormBuilder $formBuilder): string
    {
        $this->pageTitle(trans('core/base::forms.edit_item', ['name' => $liveStream->title]));

        return $formBuilder->create(LiveStreamForm::class, ['model' => $liveStream])->renderForm();
    }

    public function update(LiveStream $liveStream, LiveStreamRequest $request): BaseHttpResponse
    {
        event(new BeforeUpdateContentEvent($request, $liveStream));

        $liveStream->update($request->validated());

        event(new UpdatedContentEvent('live-stream', $request, $liveStream));

        return $this->httpResponse()
            ->setPreviousUrl(route('live-streams.index'))
            ->withUpdatedSuccessMessage();
    }

    public function destroy(LiveStream $liveStream): DeleteResourceAction
    {
        return DeleteResourceAction::make($liveStream);
    }
}
