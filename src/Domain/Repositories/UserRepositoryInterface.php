<?php

namespace App\Domain\Repositories;

use App\Domain\Entities\User;

interface UserRepositoryInterface
{
    /**
     * Retrieve all users from the repository.
     *
     * @return array An array of user data.
     */
    public function all(): array;

    /**
     * Find a user by their ID.
     *
     * @param int $id The ID of the user.
     * @return array|null The user data, or null if not found.
     */
    public function findById(int $id): ?array;

    /**
     * Create a new user in the repository.
     *
     * @param User $user The user entity to create.
     * @return bool True on success, false on failure.
     */
    public function create(User $user): bool;

    /**
     * Update an existing user in the repository.
     *
     * @param User $user The user entity to update.
     * @return bool True on success, false on failure.
     */
    public function update(User $user): bool;

    /**
     * Delete a user from the repository by their ID.
     *
     * @param int $id The ID of the user.
     * @return bool True on success, false on failure.
     */
    public function delete(int $id): bool;
}
