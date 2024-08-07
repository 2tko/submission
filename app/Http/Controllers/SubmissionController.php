<?php

namespace App\Http\Controllers;

use App\Http\Requests\SubmissionRequest;
use App\Jobs\SubmissionSaveJob;
use App\ValueObjects\SubmissionSaveValueObject;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

class SubmissionController extends Controller
{
    public function submit(SubmissionRequest $request): JsonResponse
    {
        SubmissionSaveJob::dispatch(new SubmissionSaveValueObject(
            $request->get('name'),
            $request->get('email'),
            $request->get('message'),
        ));

        return response()->json([], Response::HTTP_ACCEPTED);
    }
}