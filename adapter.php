<?php

/**
 * A service for Facebook with its own native methods.
 */
class Facebook {
    public function getUserToken($userData) {
        // Return token using Facebook's method.
    }

    public function postUpdate($token, $message) {
        // Post update using Facebook's system.
    }
}

/**
 * A service for Twitter with different method names.
 */
class Twitter {
    public function checkUserToken($userData) {
        // Return token using Twitter's method.
        return '';
    }

    public function setStatusUpdate($token, $message) {
        // Post update using Twitter's method.
        return '';
    }
}

/**
 * Interface that defines common methods for status updates.
 */
interface iStatusUpdate {
    public function getUserToken($userData);
    public function postUpdate($token, $message);
}

/**
 * TwitterAdapter adapts Twitter's methods to match the iStatusUpdate interface.
 */
class TwitterAdapter implements iStatusUpdate {
    protected $twitter;

    public function __construct(Twitter $twitter) {
        $this->twitter = $twitter;
    }

    public function getUserToken($userData) {
        // Adapt Twitter's method to get a user token.
        return $this->twitter->checkUserToken($userData);
    }

    public function postUpdate($token, $message) {
        // Adapt Twitter's method to post an update.
        return $this->twitter->setStatusUpdate($token, $message);
    }
}

/**
 * SomeOtherServiceAdapteer adapts another service to our iStatusUpdate interface.
 */
class SomeOtherServiceAdapteer implements iStatusUpdate {
    protected $otherService;

    public function __construct(SomeOtherService $otherService) {
        $this->otherService = $otherService;
    }

    public function getUserToken($userData) {
        // Adapt the other service's authentication method.
        return $this->otherService->authenticate($userData);
    }

    public function postUpdate($token, $message) {
        // Adapt or implement post-update functionality for the other service.
    }
}

// Example usage of the adapter:
$statusUpdate = new SomeOtherServiceAdapteer(new SomeOtherService());
$token = $statusUpdate->getUserToken(['email' => 'hesam@gmail.com', 'password' => '123456']);
$statusUpdate->postUpdate($token, 'some message');
