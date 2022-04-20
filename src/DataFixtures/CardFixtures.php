<?php

namespace App\DataFixtures;

use App\Entity\Card;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class CardFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        for($i = 1 ; $i <= 10 ; $i++){
            $card = new Card();
            $card->setName('Johnny');
            $card->setFirstName('Halliday');
            $card->setEMail('test@gmail.com');
            $card->setImageUser('https://fac.img.pmdstatic.net/fit/http.3A.2F.2Fprd2-bone-image.2Es3-website-eu-west-1.2Eamazonaws.2Ecom.2Fprismamedia_people.2F2017.2F06.2F30.2Fc9d52544-ac11-4e20-8b6a-3b216fce713d.2Ejpeg/326x326/quality/80/crop-from/center/johnny-hallyday.jpeg');

            $manager->persist($card);
        }

        $manager->flush();
    }
}
