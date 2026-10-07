<?php

// src/DataFixtures/GroupFixtures.php
// ...
class GroupFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $userGroup = new Group('administrators');
        // this reference returns the User object created in UserFixtures
        $userGroup->addUser($this->getReference(UserFixtures::ADMIN_USER_REFERENCE, User::class));

        $manager->persist($userGroup);
        $manager->flush();
    }
}