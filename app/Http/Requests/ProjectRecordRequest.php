<?php

namespace App\Http\Requests;

use App\Models\ProjectRecord;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProjectRecordRequest extends FormRequest
{
    public function rules(): array
    {
        $uniqueTitle = Rule::unique('project_records', 'title');
        if ($record = $this->route('record')) {
            $uniqueTitle->ignore($record);
        }

        return [
            'title' => ['required', 'string', 'max:120', $uniqueTitle],
            'category' => ['required', Rule::in(ProjectRecord::CATEGORIES)],
            'summary' => ['required', 'string', 'max:240'],
            'body' => ['required', 'string', 'max:12000'],
        ];
    }
}
