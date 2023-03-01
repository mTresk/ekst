<?php

namespace App\Http\Controllers;


use App\Http\Requests\FeedbackRequest;
use App\Mail\FeedbackReceived;
use App\Models\Feedback;
use Illuminate\Support\Facades\Mail;

class FeedbackController extends Controller
{
    public function feedback(FeedbackRequest $request)
    {
        $formData = $request->validated();

        if ($formData) {
            Feedback::create($formData);
        }

        foreach ([config('mail.admin_email'), config('mail.manager_email')] as $recipient) {
            Mail::to($recipient)->send(new FeedbackReceived($formData));
        }

        return response()->json('Спасибо за сообщение!');
    }
}
