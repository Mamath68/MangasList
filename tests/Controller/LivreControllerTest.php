<?php

namespace App\Test\Controller;

use App\Entity\Livre;
use App\Repository\LivreRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\KernelBrowser;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class LivreControllerTest extends WebTestCase
{
    private KernelBrowser $client;
    private LivreRepository $repository;
    private string $path = '/livre/';
    private EntityManagerInterface $manager;

    protected function setUp(): void
    {
        $this->client = static::createClient();
        $this->repository = static::getContainer()->get('doctrine')->getRepository(Livre::class);

        foreach ($this->repository->findAll() as $object) {
            $this->manager->remove($object);
        }
    }

    public function testIndex(): void
    {
        $crawler = $this->client->request('GET', $this->path);

        self::assertResponseStatusCodeSame(200);
        self::assertPageTitleContains('Livre index');

        // Use the $crawler to perform additional assertions e.g.
        // self::assertSame('Some text on the page', $crawler->filter('.p')->first());
    }

    public function testNew(): void
    {
        $originalNumObjectsInRepository = count($this->repository->findAll());

        $this->markTestIncomplete();
        $this->client->request('GET', sprintf('%snew', $this->path));

        self::assertResponseStatusCodeSame(200);

        $this->client->submitForm('Save', [
            'livre[nom]' => 'Testing',
            'livre[img]' => 'Testing',
            'livre[description]' => 'Testing',
            'livre[auteurOriginal]' => 'Testing',
            'livre[scenariste]' => 'Testing',
            'livre[dessinateur]' => 'Testing',
            'livre[Traducteur]' => 'Testing',
            'livre[editeur]' => 'Testing',
            'livre[auteur]' => 'Testing',
            'livre[types]' => 'Testing',
        ]);

        self::assertResponseRedirects('/livre/');

        self::assertSame($originalNumObjectsInRepository + 1, count($this->repository->findAll()));
    }

    public function testShow(): void
    {
        $this->markTestIncomplete();
        $fixture = new Livre();
        $fixture->setNom('My Title');
        $fixture->setImg('My Title');
        $fixture->setDescription('My Title');
        $fixture->setauteurOriginal('My Title');
        $fixture->setScenariste('My Title');
        $fixture->setDessinateur('My Title');
        $fixture->setTraducteur('My Title');
        $fixture->setEditeur('My Title');
        $fixture->setAuteur('My Title');
        $fixture->setTypes('My Title');

        $this->manager->persist($fixture);
        $this->manager->flush();

        $this->client->request('GET', sprintf('%s%s', $this->path, $fixture->getId()));

        self::assertResponseStatusCodeSame(200);
        self::assertPageTitleContains('Livre');

        // Use assertions to check that the properties are properly displayed.
    }

    public function testEdit(): void
    {
        $this->markTestIncomplete();
        $fixture = new Livre();
        $fixture->setNom('My Title');
        $fixture->setImg('My Title');
        $fixture->setDescription('My Title');
        $fixture->setauteurOriginal('My Title');
        $fixture->setScenariste('My Title');
        $fixture->setDessinateur('My Title');
        $fixture->setTraducteur('My Title');
        $fixture->setEditeur('My Title');
        $fixture->setAuteur('My Title');
        $fixture->setTypes('My Title');

        $this->manager->persist($fixture);
        $this->manager->flush();

        $this->client->request('GET', sprintf('%s%s/edit', $this->path, $fixture->getId()));

        $this->client->submitForm('Update', [
            'livre[nom]' => 'Something New',
            'livre[img]' => 'Something New',
            'livre[description]' => 'Something New',
            'livre[auteurOriginal]' => 'Something New',
            'livre[scenariste]' => 'Something New',
            'livre[dessinateur]' => 'Something New',
            'livre[Traducteur]' => 'Something New',
            'livre[editeur]' => 'Something New',
            'livre[auteur]' => 'Something New',
            'livre[types]' => 'Something New',
        ]);

        self::assertResponseRedirects('/livre/');

        $fixture = $this->repository->findAll();

        self::assertSame('Something New', $fixture[0]->getNom());
        self::assertSame('Something New', $fixture[0]->getImg());
        self::assertSame('Something New', $fixture[0]->getDescription());
        self::assertSame('Something New', $fixture[0]->getauteurOriginal());
        self::assertSame('Something New', $fixture[0]->getScenariste());
        self::assertSame('Something New', $fixture[0]->getDessinateur());
        self::assertSame('Something New', $fixture[0]->getTraducteur());
        self::assertSame('Something New', $fixture[0]->getEditeur());
        self::assertSame('Something New', $fixture[0]->getAuteur());
        self::assertSame('Something New', $fixture[0]->getTypes());
    }

    public function testRemove(): void
    {
        $this->markTestIncomplete();

        $originalNumObjectsInRepository = count($this->repository->findAll());

        $fixture = new Livre();
        $fixture->setNom('My Title');
        $fixture->setImg('My Title');
        $fixture->setDescription('My Title');
        $fixture->setauteurOriginal('My Title');
        $fixture->setScenariste('My Title');
        $fixture->setDessinateur('My Title');
        $fixture->setTraducteur('My Title');
        $fixture->setEditeur('My Title');
        $fixture->setAuteur('My Title');
        $fixture->setTypes('My Title');

        $this->manager->persist($fixture);
        $this->manager->flush();

        self::assertSame($originalNumObjectsInRepository + 1, count($this->repository->findAll()));

        $this->client->request('GET', sprintf('%s%s', $this->path, $fixture->getId()));
        $this->client->submitForm('Delete');

        self::assertSame($originalNumObjectsInRepository, count($this->repository->findAll()));
        self::assertResponseRedirects('/livre/');
    }
}
