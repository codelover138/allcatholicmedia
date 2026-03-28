<?php

namespace Acm\LiveStream\Http\Requests;

use Botble\Base\Rules\OnOffRule;
use Botble\Support\Http\Requests\Request;

class LiveStreamRequest extends Request
{
    public function rules(): array
    {
        return [
            'title'        => ['required', 'string', 'max:255'],
            'description'  => ['nullable', 'string'],
            'embed_url'    => ['required', 'string', 'max:500'],
            'source_name'  => ['nullable', 'string', 'max:255'],
            'location'     => ['nullable', 'string', 'max:255'],
            'is_live'      => [new OnOffRule()],
            'scheduled_at' => ['nullable', 'date'],
            'thumbnail'    => ['nullable', 'string', 'max:500'],
            'order_column' => ['nullable', 'integer'],
            'status'       => ['nullable', 'string', 'in:published,draft'],
        ];
    }
}
