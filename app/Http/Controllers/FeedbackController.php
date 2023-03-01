<?php

namespace App\Http\Controllers;


use App\Http\Requests\FeedbackRequest;
use App\Models\Feedback;

class FeedbackController extends Controller
{
    public function feedback(FeedbackRequest $request)
    {
        $formData = $request->validated();

        if ($formData) {
            Feedback::create($formData);
        }

//        foreach ([config('mail.admin_email'), config('mail.manager_email')] as $recipient) {
//            Mail::to($recipient)->send(new CallbackForm($formData));
//        }

        return response()->json('Спасибо за сообщение!');
    }
}
