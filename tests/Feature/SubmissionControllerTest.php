<?php

namespace Tests\Feature;

use App\Models\Submission;
use App\Models\SubmissionLog;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;

class SubmissionControllerTest extends TestCase
{
    use DatabaseTransactions;

    public function testSubmitSuccess(): void
    {
        $response = $this->post('/api/submit', [
            'name' => 'test',
            'email' => 'test@test.test',
            'message' => 'test message',
        ]);

        /** @var Submission $submissions */
        $submission = Submission::query()->get()->first();
        /** @var SubmissionLog $submissionLog */
        $submissionLog = SubmissionLog::query()->get()->first();

        $response->assertStatus(202);
        $this->assertEquals('test', $submission->name);
        $this->assertEquals('test@test.test', $submission->email);
        $this->assertEquals('test message', $submission->message);
        $this->assertEquals(['name' => 'test', 'email' => 'test@test.test'], $submissionLog->meta);
    }

    public function testRequiredParams(): void
    {
        $response = $this->post('/api/submit');

        $response->assertStatus(422);
        $response->assertContent('{"name":["The name field is required."],"email":["The email field is required."],"message":["The message field is required."]}');
    }

    public function testWrongEmail(): void
    {
        $response = $this->post('/api/submit', [
            'name' => 'test',
            'email' => 'test',
            'message' => 'test message',
        ]);

        $response->assertStatus(422);
        $response->assertContent('{"email":["The email field must be a valid email address."]}');
    }
}