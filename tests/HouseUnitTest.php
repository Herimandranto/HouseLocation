<?php

namespace App\Tests;

use App\Entity\Categorie;
use App\Entity\House;
use App\Entity\User;
use DateTime;
use DateTimeImmutable;
use PHPUnit\Framework\TestCase;

class HouseUnitTest extends TestCase
{
    public function testIsTrue()
    {
        $house = new House();
        $datetime = new DateTime();
        $datetime1 = new DateTimeImmutable();
        $categorie = new Categorie();
        $user = new User();

        $house->setNom('nom')
            ->setDescription('description')
            ->setEnLocation(true)
            ->setPrix(2000)
            ->setDateDisponibilite($datetime)
            ->setCreatedAt($datetime1)
            ->setFile('file')
            ->addCategorie($categorie)
            ->setUser($user);

        $this->assertTrue($house->getNom() === 'nom');
        $this->assertTrue($house->getDescription() === 'description');
        $this->assertTrue($house->isEnLocation() === true);
        $this->assertTrue($house->getPrix() == 2000);
        $this->assertTrue($house->getDateDisponibilite() === $datetime);
        $this->assertTrue($house->getCreatedAt() === $datetime1);
        $this->assertTrue($house->getFile() === 'file');
        $this->assertContains($categorie, $house->getCategorie());
        $this->assertTrue($house->getUser() === $user);
    }

    public function testIsFalse()
    {
        $house = new House();
        $datetime = new DateTime();
        $datetime1 = new DateTimeImmutable();
        $categorie = new Categorie();
        $user = new User();

        $house->setNom('nom')
            ->setDescription('description')
            ->setEnLocation(true)
            ->setPrix(2000)
            ->setDateDisponibilite($datetime)
            ->setCreatedAt($datetime1)
            ->setFile('file')
            ->addCategorie($categorie)
            ->setUser($user);

        $this->assertFalse($house->getNom() === 'false');
        $this->assertFalse($house->getDescription() === 'false');
        $this->assertFalse($house->isEnLocation() === false);
        $this->assertFalse($house->getPrix() == 3000);
        $this->assertFalse($house->getDateDisponibilite() === new DateTime());
        $this->assertFalse($house->getCreatedAt() === new DateTimeImmutable());
        $this->assertFalse($house->getFile() === 'false');
        $this->assertNotContains(new Categorie(), $house->getCategorie());
        $this->assertFalse($house->getUser() === new User());
    }

    public function testIsEmpty()
    {
        $house = new House();

        $this->assertEmpty($house->getNom());
        $this->assertEmpty($house->getDescription());
        $this->assertEmpty($house->isEnLocation());
        $this->assertEmpty($house->getPrix());
        $this->assertEmpty($house->getDateDisponibilite());
        $this->assertEmpty($house->getCreatedAt());
        $this->assertEmpty($house->getFile());
        $this->assertEmpty($house->getCategorie());
        $this->assertEmpty($house->getUser());
    }
}
