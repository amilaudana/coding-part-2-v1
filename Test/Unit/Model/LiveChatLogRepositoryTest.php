<?php

namespace Aligent\LiveChat\Test\Unit\Model;

use PHPUnit\Framework\TestCase;
use Aligent\LiveChat\Model\LiveChatLogRepository;
use Aligent\LiveChat\Model\LiveChatLog;
use Aligent\LiveChat\Model\ResourceModel\LiveChatLog as ResourceLiveChatLog;
use Magento\Framework\Exception\CouldNotSaveException;
use PHPUnit\Framework\MockObject\MockObject;

class LiveChatLogRepositoryTest extends TestCase
{
    /**
     * @var LiveChatLogRepository
     * The repository being tested.
     */
    protected $repository;

    /**
     * @var ResourceLiveChatLog|MockObject
     * A mock object for the resource model, simulating the database interactions.
     */
    protected $resourceMock;

    /**
     * @var LiveChatLog|MockObject
     * A mock object for the LiveChatLog model, simulating the LiveChat log data entity.
     */
    protected $logMock;

    /**
     * Setup method to initialize the necessary mock objects before each test.
     *
     * @return void
     */
    protected function setUp(): void
    {
        // Create a mock for the ResourceLiveChatLog class
        $this->resourceMock = $this->createMock(ResourceLiveChatLog::class);
        // Create a mock for the LiveChatLog model
        $this->logMock = $this->createMock(LiveChatLog::class);

        // Instantiate the LiveChatLogRepository with the mocked ResourceLiveChatLog
        $this->repository = new LiveChatLogRepository(
            $this->resourceMock
        );
    }

    /**
     * Test the successful save operation.
     *
     * @return void
     */
    public function testSaveSuccess(): void
    {
        // Expect the 'save' method to be called once with the mock LiveChatLog model
        $this->resourceMock->expects($this->once())
            ->method('save')
            ->with($this->logMock);

        // Call the save method in the repository
        $this->repository->save($this->logMock);
    }

    /**
     * Test that the repository throws a CouldNotSaveException if an error occurs during save.
     *
     * @return void
     */
    public function testSaveThrowsCouldNotSaveException(): void
    {
        // Simulate an exception being thrown when trying to save the LiveChat log
        $this->resourceMock->expects($this->once())
            ->method('save')
            ->with($this->logMock)
            ->willThrowException(new \Exception('Error saving data'));

        // Expect a CouldNotSaveException to be thrown with a specific message
        $this->expectException(CouldNotSaveException::class);
        $this->expectExceptionMessage('Could not save LiveChat Log: Error saving data');

        // Call the save method in the repository, which should trigger the exception
        $this->repository->save($this->logMock);
    }
}
