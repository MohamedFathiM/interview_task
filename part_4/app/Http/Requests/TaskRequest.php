<?php

namespace App\Http\Requests;

use App\Models\Task;
use Closure;
use Illuminate\Foundation\Http\FormRequest;

class TaskRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'title' => [
                'required', 'min:2', 'max:255', 'string',
                function (string $attribute, mixed $value, Closure $fail) {
                    $taskExists = Task::where('user_id', auth()->id())
                        ->where('title', $value)
                        ->where('id', '<>', $this->task?->id)
                        ->exists();

                    if ($taskExists) {
                        $fail("The {$attribute} is already exists.");
                    }
                },
            ],
            'description' => 'nullable|min:2|max:500',
            'is_done' => 'nullable|in:0,1'
        ];
    }
}
