<?php

namespace App\Http\Controllers;

use App\Http\Requests\ReviewRequest;
use App\Models\Feedback;
use App\Models\Review;

class ReviewController extends Controller
{
    public function review(ReviewRequest $request)
    {
        $formData = $request->validated();

        if ($formData) {
            Review::create($formData);
        }

//        foreach ([config('mail.admin_email'), config('mail.manager_email')] as $recipient) {
//            Mail::to($recipient)->send(new CallbackForm($formData));
//        }

        return response()->json('Спасибо за сообщение!');
    }
}
