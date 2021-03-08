<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\TaskStatus;
use App\Models\User;

class TaskStatusControllerTest extends TestCase
{
    private User $user;

    protected function setUp(): void
    {
        parent::setUp();
        TaskStatus::factory()->count(2)->make();
        $this->user = User::factory()->create();
    }

    public function testIndex()
    {
        $response = $this->get(route('task_statuses.index'));
        $response->assertOk();
    }

    public function testCreate()
    {
        $response = $this->actingAs($this->user)
                         ->get(route('task_statuses.create'));
        $response->assertOk();
    }

    public function testEdit()
    {
        $taskStatus = TaskStatus::factory()->create();
        $response = $this->actingAs($this->user)
                         ->get(route('task_statuses.edit', [$taskStatus]));
        $response->assertOk();
    }

    public function testStore()
    {
        $factoryData = TaskStatus::factory()->make()->toArray();
        $data = \Arr::only($factoryData, ['name']);
        $response = $this->actingAs($this->user)
                         ->post(route('task_statuses.store'), $data);
        $response->assertSessionHasNoErrors();
        $response->assertRedirect();
        $this->assertDatabaseHas('task_statuses', $data);
    }

    public function testUpdate()
    {
        $taskStatus = TaskStatus::factory()->create();
        $factoryData = TaskStatus::factory()->make()->toArray();
        $data = \Arr::only($factoryData, ['name']);
        $response = $this->actingAs($this->user)
                         ->patch(route('task_statuses.update', $taskStatus), $data);
        $response->assertSessionHasNoErrors();
        $response->assertRedirect();

        $this->assertDatabaseHas('task_statuses', $data);
    }

    public function testDestroy()
    {
       $taskStatus = TaskStatus::factory()->create();
       $response = $this->actingAs($this->user)
                        ->delete(route('task_statuses.destroy', $taskStatus));
       $response->assertSessionHasNoErrors();
       $response->assertRedirect();

       $this->assertDatabaseMissing('task_statuses', ['id' => $taskStatus->id]);
    }
}
