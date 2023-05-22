<?php

namespace Tests\Unit;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Queue;
use Illuminate\Http\UploadedFile;
use PHPUnit\Framework\TestCase;

class StoreTest extends TestCase
{
    public function testStoreMethod()
    {
        Storage::fake('image');
        
        $file = UploadedFile::fake()->image('test_image.jpg');

        $data = [
            'image' => $file
        ];

        $response = $this->post('/store', $data);

        $response->assertStatus(302); // Check if the response is a redirect
        
        // Assert that the image was stored
        Storage::disk('image')->assertExists('new_image.jpg');

        // Assert that SeedImages record was created
        $this->assertDatabaseHas('seed_images', [
            'image' => 'new_image.jpg'
        ]);

        // Assert that the RunPythonScript job was dispatched
        Queue::assertPushed(RunPythonScript::class);

        // Assert that the log contains the expected messages
        $this->assertLogContains('RUN model.py');
        $this->assertLogContains('End RUN model.py: Output:');

        $response->assertSessionHas('success', 'Image Identified Successfully');
        $response->assertSessionHas('predicted_class');
    }

    protected function assertLogContains($message)
    {
        $logFile = storage_path('logs/laravel.log');
        $logContent = file_get_contents($logFile);

        $this->assertStringContainsString($message, $logContent);
    }
}
